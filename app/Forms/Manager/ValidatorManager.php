<?php
namespace App\Forms\Manager;

use GBrabyn\DynamicForms\Error;
use GBrabyn\DynamicForms\FieldValidator\ReCaptchaV2;
use GBrabyn\DynamicForms\Manager\ValidatorManager as BaseManager;
use GBrabyn\DynamicForms\Manager\LaminasValidatorTraits;

class ValidatorManager extends BaseManager
{
    use LaminasValidatorTraits;

    public function reCaptchaV2(array $options=[], Error $error=null)
    {
        return new ReCaptchaV2(env('RECAPTCHA_SECRET'), $error, $options);
    }
}
