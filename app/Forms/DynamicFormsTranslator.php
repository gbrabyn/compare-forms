<?php


namespace App\Forms;

use GBrabyn\DynamicForms\TranslatorInterface;
use Illuminate\Translation\Translator;

class DynamicFormsTranslator implements TranslatorInterface
{
    private $translator;


    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function translate($translationKey)
    {
        $key = \strpos($translationKey, 'messages.')===0 ? $translationKey : 'dynamicForms.'.$translationKey;

        return $this->translator->get($key);
    }
}
