<?php
namespace App\Forms\Manager;

use App\Forms\DynamicFormsTranslator;
use GBrabyn\DynamicForms\Manager\ErrorDecoratorManager as BaseManager;

class ErrorDecoratorManager extends BaseManager
{
    public function __construct($doctype, DynamicFormsTranslator $translator)
    {
        parent::__construct($doctype, $translator);
    }
}
