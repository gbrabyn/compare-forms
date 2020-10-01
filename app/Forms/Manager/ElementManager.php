<?php
namespace App\Forms\Manager;

use GBrabyn\DynamicForms\Manager\ElementManagerAbstract;

class ElementManager extends ElementManagerAbstract
{
    /**
     *
     * @param string $doctype
     * @param \Laminas\Escaper\Escaper $escaper
     * @param string $locale
     */
    public function __construct(string $doctype, \Laminas\Escaper\Escaper $escaper, ?string $locale)
    {
        $this->setDocType($doctype);
        $this->setEscaper($escaper);
        $this->setLocale($locale);
    }

    /**
     *
     * @param \Laminas\Escaper\Escaper $escaper
     */
    protected function setEscaper($escaper)
    {
        $this->escaper = new \GBrabyn\DynamicForms\Element\LaminasEscaperWrapper($escaper);
    }

    /**
     *
     * @param string $locale
     */
    protected function setLocale($locale)
    {
        if($locale){
            $this->locale = $locale;
        }
    }
}
