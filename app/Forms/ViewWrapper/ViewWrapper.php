<?php

namespace App\Forms\ViewWrapper;

use GBrabyn\DynamicForms\ViewWrapper\Html5ViewWrapper;


class ViewWrapper extends Html5ViewWrapper
{
    const ERR_ABOVE = 'above';
    const ERR_RIGHT = 'right';
    const ERR_BELOW = 'below';
    const ERR_NONE = 'none';

    /**
     * Cross Site Request Forgery
     * @param array $attributes
     * @return string
     */
    public function csrf(array $attributes=[]) : string
    {
        return $this->form->element('csrf', 'csrfToken', 'csrfToken', $attributes);
    }
}
