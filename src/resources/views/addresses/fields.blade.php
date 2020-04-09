<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', Lang::get('pwweb::localisation.Country')) !!}
    {!! Form::number('country_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', Lang::get('pwweb::localisation.Type')) !!}
    {!! Form::select('type_id', $types->pluck('name', 'id'), null, ['class' => 'custom-select']) !!}
</div>

<!-- Street Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street', Lang::get('pwweb::localisation.Street')) !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<!-- Street2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street2', Lang::get('pwweb::localisation.Street 2')) !!}
    {!! Form::text('street2', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', Lang::get('pwweb::localisation.City')) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', Lang::get('pwweb::localisation.State')) !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Postcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postcode', Lang::get('pwweb::localisation.Postcode')) !!}
    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', Lang::get('pwweb::localisation.Latitude')) !!}
    {!! Form::number('lat', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Lng Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lng', Lang::get('pwweb::localisation.Longitude')) !!}
    {!! Form::number('lng', null, ['class' => 'form-control', 'step' => 'any']) !!}
</div>

<!-- Primary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primary', Lang::get('pwweb::localisation.Primary')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('primary', 0) !!}
        {!! Form::checkbox('primary', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('pwweb::localisation.Save address'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.addresses.index') }}" class="btn btn-secondary">@lang("pwweb::localisation.cancel")</a>
</div>
