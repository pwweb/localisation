<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', __('pwweb::localisation.tax.rates.singular')) !!}
    {!! Form::number('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('pwweb::localisation.tax.rates.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Compound Field' -->
<div class="d-flex align-items-center form-group col-sm-6">
    {!! Form::label('compound', __('pwweb::localisation.tax.rates.compound')) !!}
    <label class="switch switch-label switch-pill switch-primary  ml-2">
        {!! Form::hidden('compound', 0) !!}
        {!! Form::checkbox('compound', 1, null, ['class' => 'switch-input']) !!}
        <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Shipping Field' -->
<div class="d-flex align-items-center form-group col-sm-6">
    {!! Form::label('shipping', __('pwweb::localisation.tax.rates.shipping')) !!}
    <label class="switch switch-label switch-pill switch-primary  ml-2">
        {!! Form::hidden('shipping', 0) !!}
        {!! Form::checkbox('shipping', 1, null, ['class' => 'switch-input']) !!}
        <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
    </label>
</div>


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('pwweb::localisation.tax.rates.type')) !!}
    {!! Form::select('type', $types, null, ['class' => 'custom-select']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('pwweb::localisation.tax.rates.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.tax.rates.index') }}" class="btn btn-secondary">{{__('pwweb::localisation.tax.rates.cancel')}}</a>
</div>
