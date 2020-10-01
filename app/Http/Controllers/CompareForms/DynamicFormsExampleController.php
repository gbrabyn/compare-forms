<?php

namespace App\Http\Controllers\CompareForms;

use App\Model\PersonExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\{ProgrammingExperienceEditForm};

class DynamicFormsExampleController extends Controller
{
    public function add(Request $request, ProgrammingExperienceEditForm $form)
    {
        $view = view('compare-forms/dynamic/edit', [
            'form' => $form->viewWrapper(),
            'context' => 'add',
            'action' => route('compare.dynamicForms.add', ['locale'=>app()->getLocale()]),
        ]);

        if(false === $request->isMethod('POST')){
            return $view;
        }

        $form->populate($request->post(), true);

        if(false === $form->validate()){
            return $view;
        }

        $save = \array_merge($form->getSaveData(), ['sessionId'=>session()->getId(), 'lastEdit'=>\date('Y-m-d H:i:s')]);
        $personExperience = PersonExperience::create($save);
        $personExperience->save();

        return redirect()->route('compare.list');
    }

    public function edit(ProgrammingExperienceEditForm $form)
    {
        $personExperience = PersonExperience::where(['sessionId'=>session()->getId(), 'id'=>request('id')])->firstOrFail();

        $view = view('compare-forms/dynamic/edit', [
            'form' => $form->viewWrapper(),
            'context' => 'edit',
            'action' => route('compare.dynamicForms.edit', ['locale'=>app()->getLocale(), 'id'=>$personExperience->id]),
        ]);

        if(false === request()->isMethod('POST')){
            $form->populate($personExperience->toArray(), true);

            return $view;
        }

        $form->populate(request()->post(), true);
        $form->setPersonExperienceId($personExperience->id);

        if(false === $form->validate()){
            return $view;
        }

        $save = \array_merge($form->getSaveData(), ['lastEdit'=>\date('Y-m-d H:i:s')]);
        $personExperience->update($save);

        return redirect()->route('compare.list');
    }
}
