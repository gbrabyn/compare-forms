<?php
use Illuminate\Database\Eloquent;

function attributeTemplate($view, $attributes=[])
{
    $t =  view()->make($view, $attributes);
    $esc = new \Laminas\Escaper\Escaper('utf-8');

    return $esc->escapeHtmlAttr($t);
}

/**
 * Used on a laravelcollective/html form to provide JavaScript with next key to use when adding to array of fields
 * 
 * @param \Illuminate\Database\Eloquent\Model|null $model
 * @param string $parentField
 * @return int
 */
function nextKey(?Eloquent\Model $model, string $parentField) : int
{
    if(Form::oldInputIsEmpty() && $model===null){
        return 0;
    }
    
    if(Form::oldInputIsEmpty()===false){
        $parentValue = old($parentField);
    }elseif(method_exists($model, 'getFormValue')){
        $parentValue = $model->getFormValue($parentField);
    }else{
        $parentValue = data_get($model, $parentField);
    }

    if($parentValue === null || is_array($parentValue) === false){
        return 0;
    }

    /* all array keys that are positive integers */
    $intKeys = array_map('intval', array_filter(array_keys($parentValue), function($key){
        return filter_var($key, FILTER_VALIDATE_INT)!==false && abs($key)==$key;
    }));

    return count($intKeys) ? (max($intKeys) + 1) : 0;
}

/**
 * Used on a laravelcollective/html form to iterate through an array of fields
 * 
 * @param string $field
 * @param \Illuminate\Database\Eloquent\Model|null $model
 * @return array
 */
function formIterator(?Eloquent\Model $model, string $field) : array
{
    if(Form::oldInputIsEmpty() === false){
        return array_keys(old($field,[]));
    }
    
    if($model === null){
        return [];
    }
    
    $array = method_exists($model, 'getFormValue') 
            ? $model->getFormValue($field) 
            : data_get($model, $field);
    
    return is_array($array) ? array_keys($array) : [];
}

function languageSwitch()
{
    $route = request()->route();
    $currentLocale = $route->parameter('locale', 'en_US');

    if($currentLocale=='en_US'){
        $newLocale = 'de_DE';
        $text = 'Deutsch (German)';
    }else{
        $newLocale = 'en_US';
        $text = 'English';
    }

    $route->setParameter('locale', $newLocale);
    $url = route($route->getName(), $route->parameters);

    return '<a href="'.$url.'">'.$text.'</a>';
}
