<?php

namespace App\Http\Controllers\CompareForms;

use App\Model\PersonExperience;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Model\ProgrammingExperienceFormOptions as FormOptions;
use App\Http\Requests\LaravelExampleStore;

/**
 *
 * @author GBrabyn
 */
class LaravelExampleController extends Controller
{
    public function add(FormOptions $formOptions)
    {
        return view('compare-forms/laravel/add', [
            'countries' => $formOptions->getCountries('en_US'),
            'languages' => $formOptions->getProgrammingLanguages(),
            'workTypes' => $formOptions->getWorkTypeOptions(),
        ]);
    }
    
    public function store(LaravelExampleStore $request)
    {
        $validatedData = $this->savePrepared($request->validated());
        $save = array_merge($validatedData, ['sessionId'=>session()->getId()]);
        PersonExperience::create($save)->save();

        return redirect()->route('compare.list');
    }
    
    private function savePrepared(array $data) : array
    {
        unset($data['g-recaptcha-response']);
        $data['lastEdit'] = date('Y-m-d H:i:s');
        $data['additionalLanguages'] = array_values($data['additionalLanguages']);
        $data['experience'] = array_values($data['experience']);
        
        foreach($data['experience'] AS &$experience){
            $experience['additionalLanguagesUsed'] = array_values($experience['additionalLanguagesUsed']);
        }
        
        return $data;
    }
    
    public function edit(FormOptions $formOptions)
    {
        $personExp = PersonExperience::where(['sessionId'=>session()->getId(), 'id'=>request('id')])->firstOrFail();
        
        return view('compare-forms/laravel/add', [
            'personExperience' => $personExp,
            'countries' => $formOptions->getCountries('en_US'),
            'languages' => $formOptions->getProgrammingLanguages(),
            'workTypes' => $formOptions->getWorkTypeOptions(),
        ]); 
    }
    
    public function update(LaravelExampleStore $request)
    {
        $personExp = PersonExperience::where(['sessionId'=>session()->getId(), 'id'=>request('id')])->firstOrFail();
        $validatedData = $this->savePrepared($request->validated());
        $personExp->update($validatedData);

        return redirect()->route('compare.list');
    }
    
    public function delete(Request $request)
    {
        
    }
}
