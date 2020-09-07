<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('pwweb::localisation.Country')) !!}
    {!! Form::select('country_id', $countries->pluck('name', 'id'), null, ['class' => 'custom-select']) !!}
</div>

<!-- Tax Code Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_rate_id', __('pwweb::localisation.tax.rates.singular')) !!}
    {!! Form::select('tax_rate_id', $rates->pluck('name', 'id'), null, ['class' => 'custom-select']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', __('pwweb::localisation.State')) !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', __('pwweb::localisation.City')) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', __('pwweb::localisation.Postcode')) !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', __('pwweb::localisation.tax.locations.order')) !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('pwweb::localisation.tax.locations.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.tax.locations.index') }}" class="btn btn-secondary">{{__('pwweb::localisation.tax.locations.cancel')}}</a>
</div>
