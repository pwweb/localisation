<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Iso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso', Lang::get('pwweb::localisation.Iso code')) !!}
    {!! Form::text('iso', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeric Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeric_code', Lang::get('pwweb::localisation.Numeric code')) !!}
    {!! Form::number('numeric_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_code', Lang::get('pwweb::localisation.Entity code')) !!}
    {!! Form::text('entity_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', Lang::get('pwweb::localisation.Active')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Standard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('standard', Lang::get('pwweb::localisation.Standard')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('standard', 0) !!}
        {!! Form::checkbox('standard', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('pwweb::localisation.Save currency'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.currencies.index') }}" class="btn btn-secondary">@lang("pwweb::localisation.cancel")</a>
</div>
