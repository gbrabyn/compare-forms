@php
    /** @var $form App\Forms\ViewWrapper\ViewWrapper */

    $form->setDefaultErrorDecorator($form->errorDecorators()->below());
@endphp

@extends('layouts.layoutTutorials')

@section('headTitle')
    Dynamic Forms Example
@endsection

@push('scripts')
    <script src="{{ mix('/build/compare-forms/dynamic.edit.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("experience").submit();
        }
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ mix('/build/compare-forms/dynamic.edit.css') }}">
@endpush

@section('content')
    <div id="switchLang">
        @languageSwitch()
    </div>
    <header class="main">
        <h1>Dynamic Forms Example: {{$context=='add' ? trans('messages.Add Programming Experience') : trans('messages.Edit Programming Experience')}}</h1>
        <h2>I.T. Recruitment Agency - Candidate Experience Form</h2>
    </header>
    <p>
        Below is a hypothetical form for Recruitment Agencies to enter their candidates experience. It has been built with the PHP package "Dynamic Forms.
    </p>
   <p>
        Feel free to use the form and test it. Your saved data will be removed after your session has expired.
        Switch languages used in the form using the link to the above right.
    </p>
    <form id="experience" class="editForm" method="post" action="{{ $action }}">
        {!! $form->errors() !!}
        {!! $form->fieldError('g-recaptcha-response') !!}
        {!! $form->csrf() !!}
        <div
            id="experienceContainer"
            class="taskLayout"
            data-nextkey="{!! $form->nextKey('experience') !!}"
            data-template="@attributeTemplate('compare-forms.dynamic._experience', ['k'=>'__index1__', 'form'=>$form])"
            data-translate-remove-tag="{{ trans('messages.confirmRemoveTag') }}"
            data-translate-remove-job="{{ trans('messages.confirmRemoveJob') }}"
        >
            <div class="row">
                <div class="label-col">
                    <label for="fullName">@lang('messages.fullName')</label>
                </div>
                <div class="input-col">
                    {!! $form->text('fullName', ['id'=>'fullName']) !!}
                </div>
            </div>
            <div class="row">
                <div class="label-col">
                    <label for="email">@lang('messages.email')</label>
                </div>
                <div class="input-col">
                    {!! $form->email('email', ['id'=>'email']) !!}
                </div>
            </div>
            <div class="row">
                <div class="label-col">
                    <label for="address">@lang('messages.address')</label>
                </div>
                <div class="input-col">
                    {!! $form->textarea('address', ['id'=>'address']) !!}
                </div>
            </div>
            <div class="row">
                <div class="label-col">
                    <label for="countryId">@lang('messages.country')</label>
                </div>
                <div class="input-col">
                    {!! $form->select('countryOptions', 'countryId', ['id'=>'countryId']) !!}
                </div>
            </div>
            <div class="row">
                <div class="label-col">
                    @lang('messages.programmingLanguages')
                </div>
                <div class="input-col">
                    {!! $form->checkboxList('languageOptions', 'languages', ['class'=>'checkboxList', 'style'=>'column-count:3;'], $form::ERR_ABOVE) !!}
                </div>
            </div>
            <div class="row">
                <div class="label-col">
                    @lang('messages.additionalProgrammingLanguages')
                </div>
                <div class="input-col">
                    {!! $form->fieldError('additionalLanguages') !!}
                    <table
                        id="additionalLanguages"
                        data-template="{!! attributeTemplate('shared.list-row', ['form'=>$form, 'fieldKey'=>'additionalLanguages.__index__', 'nameAttribute'=>'additionalLanguages[]', 'placeholder'=>trans('messages.Programming Language')]) !!}">
                        <tbody>
                        @foreach ($form->intKeys('additionalLanguages') as $key)
                            @include('shared.list-row', ['fieldKey'=>'additionalLanguages.'.$key, 'nameAttribute'=>'additionalLanguages[]', 'placeholder'=>trans('messages.Programming Language')])
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3" align="right">
                                <button type="button" id="additionalLanguageBtn" class="newTag">@lang('messages.Add')</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <h3>@lang('messages.workExperience')</h3>
            </div>
            @foreach ($form->intKeys('experience') as $key)
                @include('compare-forms.dynamic._experience', ['k'=>$key])
            @endforeach
        </div>
        <div class="tfoot taskLayout">
            <div class="row">
                <div class="label-col">

                </div>
                <div class="input-col align-right">
                    <button type="button" id="addExperienceBtn">@lang('messages.addExperience')</button>
                </div>
            </div>
            <div id="saveRow" class="row">
                <div class="label-col">

                </div>
                <div class="input-col align-center">
                    <button class="g-recaptcha submitBtn" data-sitekey="{!! env('RECAPTCHA_KEY') !!}" data-callback='onSubmit'>@lang('messages.formSave')</button>
                </div>
            </div>
        </div>
    </form>
@endsection
