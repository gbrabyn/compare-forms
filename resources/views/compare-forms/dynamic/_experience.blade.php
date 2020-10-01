@php
    /** @var $form App\Forms\ViewWrapper\ViewWrapper
     *  @var $k int
     */
@endphp
<fieldset class="experience">
    <h4>
        @lang('messages.Job')
    </h4>
    <div class="row">
        <div class="label-col">

        </div>
        <div class="input-col align-right">
            <button class="removeJob" type="button">@lang('messages.Remove Job')</button>
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.companyName')
        </div>
        <div class="input-col">
            {!! $form->text("experience.$k.companyName") !!}
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.officeLocation')
        </div>
        <div class="input-col">
            {!! $form->textarea("experience.$k.officeLocation") !!}
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.officeCountry')
        </div>
        <div class="input-col">
            {!! $form->select('countryOptions', "experience.$k.officeCountryId") !!}
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.period')
        </div>
        <div class="input-col">
            <div class="table-cell">
                {!! $form->date("experience.$k.startDate", ['placeholder'=>trans('messages.start')]) !!}
            </div>
            <div class="table-cell">
                @lang('messages.to')
            </div>
            <div class="table-cell">
                {!! $form->date("experience.$k.finishDate", ['placeholder'=>trans('messages.finish')]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.type')
        </div>
        <div class="input-col">
            {!! $form->radioList('workTypeOptions', "experience.$k.type", ['class'=>'checkboxListHorizontal'], $form::ERR_ABOVE) !!}
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.programmingLanguagesUsed')
        </div>
        <div class="input-col">
            {!! $form->checkboxList('languageOptions', "experience.$k.languagesUsed", ['class'=>'checkboxList', 'style'=>'column-count:3;'], $form::ERR_ABOVE) !!}
        </div>
    </div>
    <div class="row">
        <div class="label-col">
            @lang('messages.Additional Programming Languages Used')
        </div>
        <div class="input-col">
            <table
                class="resultSet hoverRows"
                data-template="{!! attributeTemplate('shared.list-row', ['form'=>$form, 'fieldKey'=>'experience.'.$k.'.additionalLanguagesUsed.__index2__', 'nameAttribute'=>'experience['.$k.'][additionalLanguagesUsed][]', 'placeholder'=>trans('messages.Programming Language')]) !!}">
                <tbody>
                @foreach ($form->intKeys('experience.'.$k.'.additionalLanguagesUsed') as $key2)
                    @include('shared.list-row', ['fieldKey'=>'experience.'.$k.'.additionalLanguagesUsed.'.$key2, 'nameAttribute'=>'experience['.$k.'][additionalLanguagesUsed][]', 'placeholder'=>trans('messages.Programming Language')])
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" align="right">
                        <button type="button" class="additionalFrameworkBtn">@lang('messages.Add')</button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</fieldset>
