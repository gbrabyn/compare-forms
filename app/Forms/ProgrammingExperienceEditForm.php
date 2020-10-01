<?php


namespace App\Forms;

use GBrabyn\DynamicForms\Element\Options;
use App\Repository\{CountriesRepository, ProgrammingLanguagesRepository};
use App\Model\PersonExperience;
use GBrabyn\DynamicForms\Error;
use GBrabyn\DynamicForms\Field;
use GBrabyn\DynamicForms\FieldValidator\Callback;
use GBrabyn\DynamicForms\GroupValidator\WhenThen\ThenAllMustNotHave;
use GBrabyn\DynamicForms\GroupValidator\WhenThen\WhenAllHave;
use GBrabyn\DynamicForms\Transform\CallableTransform;

class ProgrammingExperienceEditForm extends FormAbstract
{
    /** @var Options */
    protected $languageOptions, $countryOptions, $workTypeOptions;

    /** @var CountriesRepository */
    private $countriesRepository;

    /** @var ProgrammingLanguagesRepository */
    private $languagesRepository;

    /** @var int|null */
    private $personExperienceId;

    public function __construct(
        CountriesRepository $countriesRepository,
        ProgrammingLanguagesRepository $languagesRepository,
        DynamicFormsTranslator $translator)
    {
        parent::__construct($translator);
        $this->countriesRepository = $countriesRepository;
        $this->languagesRepository = $languagesRepository;
    }

    public function setPersonExperienceId(int $id)
    {
        $this->personExperienceId = $id;
    }

    private function setWorkTypeOptions()
    {
        $this->workTypeOptions = new Options();
        $this->workTypeOptions->add('fullTime', $this->translator->translate('messages.full time'));
        $this->workTypeOptions->add('partTime', $this->translator->translate('messages.part time'));
        $this->workTypeOptions->add('temporary', $this->translator->translate('messages.contract / temporary'));
    }

    private function setCountryOptions()
    {
        $this->countryOptions = new Options();
        $this->countryOptions->add('', $this->translator->translate('messages.Select country'));

        foreach($this->countriesRepository->getAll($this->locale) as $country){
            $this->countryOptions->add($country['id'], $country['name']);
        }
    }

    private function setLanguageOptions()
    {
        $this->languageOptions = new Options(\array_values($this->languagesRepository->getAll()));
    }

    protected function activate()
    {
        $this->csrf(3600);
        $this->setWorkTypeOptions();
        $this->setCountryOptions();
        $this->setLanguageOptions();
    }

    protected function config(array $formValues)
    {
        $this->field('fullName')->addValidators([
            $this->validators->scalar(),
            $this->validators->required(),
            $this->validators->stringLength(0, 255),
            $this->uniqueEntryValidator(),
        ]);

        $this->field('email')->addValidators([
            $this->validators->required(),
            $this->validators->email(),
            $this->validators->stringLength(0, 255),
        ]);

        $this->field('address')->addTransformers([
            $this->transformers->emptyStringToNull(),
        ])->addValidators([
            $this->validators->scalar(),
        ]);

        $this->field('countryId')->addValidators([
            $this->validators->posInt(),
            $this->validators->required(),
        ]);

        $this->field('languages')
            ->ensureArray()
            ->addValidators([
                $this->validators->allowedMultiple($this->languageOptions->getValues()),
            ]);

        $this->field('additionalLanguages')
            ->ensureArray()
            ->addTransformers([
                new CallableTransform(function($array){
                    return \array_filter($array, function($value){
                        return !empty($value);
                    });
                }),
            ])
            ->addValidators([
                $this->validators->sequentialArray(),
            ]);
         
        $uniqueLangs = [];
        foreach($this->seqKeyFields($formValues, 'additionalLanguages') as [$additionalLang]){
            /* @var $additionalLang Field */
            $additionalLang->addValidators([
                $this->validators->scalar(), 
            ]);
            $uniqueLangs[] = $additionalLang;
        }
        
        $this->addValidator($this->validators->unique($uniqueLangs));

        $when = (new WhenAllHave())->add($this->field('additionalLanguages'), [[]]);
        $then = (new ThenAllMustNotHave())->add($this->field('languages'), [[]], new Error('"Programming Languages" or "Additional Languages" needs entries', 'messages.languagesRequired'));
        $this->addValidator($this->validators->whenThen($when, $then));

        $childSuffixes = ['companyName', 'officeLocation', 'officeCountryId', 'startDate', 'finishDate', 'type',
            'languagesUsed', 'additionalLanguagesUsed'];

        foreach($this->series($formValues, 'experience', ...$childSuffixes) as $k => $job){
            /**
             * @var $companyName Field;
             * @var $officeLocation Field;
             * @var $officeCountryId Field;
             * @var $startDate Field;
             * @var $finishDate Field;
             * @var $type Field;
             * @var $languages Field;
             * @var $additionalLanguages Field;
             */

            [   $companyName, $officeLocation, $officeCountryId, $startDate, $finishDate, $type,
                $languages, $additionalLanguages
            ] = $job;

            $companyName->addValidators([
                $this->validators->scalar(),
                $this->validators->required(),
            ]);

            $officeLocation->addValidators([
                $this->validators->scalar(),
            ]);

            $officeCountryId->addValidators([
                $this->validators->posInt(),
                $this->validators->required(),
            ]);

            $startDate->addValidators([
                $this->validators->date('Y-m-d'),
                $this->validators->required(),
            ]);

            $finishDate->addValidators([
                $this->validators->date('Y-m-d'),
                $this->validators->required(),
            ]);

            $this->addValidator(
                $this->validators->compareStrings($finishDate, $startDate, '>', new Error('Must be after start date', 'messages.formAfterStartDate'))
            );

            $type->addValidators([
                $this->validators->required(),
                $this->validators->allowed($this->workTypeOptions->getValues()),
            ]);

            $languages
                ->ensureArray()
                ->addValidators([
//                    $this->validators->arrayCount(1, null, new Error('Select Programming Languages', 'messages.Select Programming Languages')),
                    $this->validators->allowedMultiple($this->languageOptions->getValues()),
                ]);

            $additionalLanguages
                ->ensureArray()
                ->addTransformers([
                    new CallableTransform(function($array){
                        return \array_filter($array, function($value){
                            return !empty($value);
                        });
                    }),
                ])
                ->addValidators([
                    $this->validators->sequentialArray(),
                ]);
                    
            $uniqueUsedLangs = [];
            foreach($this->seqKeyFields($formValues, 'experience.'.$k.'.additionalLanguagesUsed') as [$additionalUsedLang]){
                /* @var $additionalUsedLang Field */
                $additionalUsedLang->addValidators([
                    $this->validators->scalar(), 
                ]);
                $uniqueUsedLangs[] = $additionalUsedLang;
            }
            
            $this->addValidator($this->validators->unique($uniqueUsedLangs));

            $when = (new WhenAllHave())->add($additionalLanguages, [[]]);
            $then = (new ThenAllMustNotHave())->add($languages, [[]], new Error('Languages (or Additional Languages) Used is Required', 'messages.languagesUsedRequired'));
            $this->addValidator($this->validators->whenThen($when, $then));
        }
        
        $this->field('g-recaptcha-response')->addValidators([
            $this->validators->reCaptchaV2(),
        ]);
    }

    private function uniqueEntryValidator() : Callback
    {
        return new Callback(function($value, Error $error){

            $select = PersonExperience::where(['sessionId'=>session()->getId(), 'fullName'=>$value]);

            if($this->personExperienceId){
                $select->whereKeyNot($this->personExperienceId);
            }

            $existing = $select->first();

            if($existing){
                $error->setArgs(['${url}'=>route('compare.dynamicForms.edit', ['locale'=>$this->locale, 'id'=>$existing->id])]);
                return false;
            }

            return true;

        }, new Error('Duplicate entry. See <a href="${url}" target="_blank">here</a>', 'messages.duplicateEntry'));
    }

    public function getSaveData() : array
    {
        $r = $this->getDefinedValues();
        $r['experience'] = \array_values($r['experience']);

        return $r;
    }



}
