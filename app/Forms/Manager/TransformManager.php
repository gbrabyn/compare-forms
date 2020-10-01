<?php
namespace App\Forms\Manager;

use GBrabyn\DynamicForms\Manager\TransformManager as BaseManager;
use GBrabyn\DynamicForms\Manager\LaminasTransformTraits;

class TransformManager extends BaseManager
{
    use LaminasTransformTraits;

    protected $locale = 'en_US';

    /**
     *
     * @param string $locale
     */
    public function __construct(?string $locale=null)
    {
        $this->setLocale($locale);
    }

    /**
     *
     * @param string $locale
     */
    protected function setLocale(?string $locale)
    {
        if($locale){
            $this->locale = $locale;
        }
    }

}
