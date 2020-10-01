<?php

namespace App\Forms;

use App\Forms\Manager\ElementManager;
use App\Forms\Manager\ErrorDecoratorManager;
use App\Forms\Manager\TransformManager;
use App\Forms\Manager\ValidatorManager;
use App\Forms\ViewWrapper\ViewWrapper;
use GBrabyn\DynamicForms;
use GBrabyn\DynamicForms\ViewWrapper\ViewWrapperAbstract;

abstract class FormAbstract extends DynamicForms\FormUsingViewWrapperAbstract
{
    protected $charset = 'utf-8';
    protected $doctype = 'html5';

    /* @var ElementManager */
    protected $elements;

    /* @var ErrorDecoratorManager */
    protected $errorDecorators;

    /* @var ValidatorManager */
    protected $validators;

    /* @var TransformManager */
    protected $transformers;

    public function __construct(?DynamicFormsTranslator $translator=null)
    {
        parent::__construct($translator);
        $this->locale = app()->getLocale();
    }

    protected function getDefaultTransformerManager()
    {
        return new TransformManager($this->locale);
    }

    protected function getDefaultValidatorManager()
    {
        $m = new ValidatorManager();

        if($this->translator){
            $m->setLaminasTranslator(new DynamicForms\Manager\LaminasTranslatorWrapper($this->translator));
        }

        return $m;
    }

    protected function baseActivate()
    {
        $this->setErrorDecorators();

        $this->addUniveralTransformers([
            $this->transformers->trim(),
        ]);
    }

    protected function setErrorDecorators()
    {
        $this->setFormErrorsDecorator($this->errorDecorators->form());
        $this->setDefaultStandAloneErrorDecorator($this->errorDecorators->separate());
        $this->registerErrorDecorator('above', $this->errorDecorators->above());
        $this->registerErrorDecorator('below', $this->errorDecorators->below());
        $this->registerErrorDecorator('right', $this->errorDecorators->rightSide());
        $this->registerErrorDecorator('rightSide', $this->errorDecorators->rightSide());
        $this->registerErrorDecorator('none', $this->errorDecorators->none());
    }

    protected function getViewWrapper(): ViewWrapperAbstract
    {
        return new ViewWrapper($this, $this->elements, $this->errorDecorators);
    }

    /**
     * Cross Site Request Forgery
     * @param int $timeout
     */
    protected function csrf(int $timeout = 3600)
    {
        $csrfValidator = $this->validators->getCsrfTokenValidator(['timeout' => $timeout]);
        $this->registerElement('csrf', $this->elements->hidden($csrfValidator->getHash()));

        $this->addValidator(
            $this->validators->csrf($this->field('csrfToken'), $csrfValidator)
        );

    }

    public function getDefinedValues()
    {
        $data = parent::getDefinedValues();
        unset($data['csrfToken']);
        unset($data['g-recaptcha-response']);

        return $data;
    }
}
