<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', __('pwweb::localisation.Country')) !!}
    <p>{{ $location->country->name }}</p>
</div>

<!-- Tax Code Id Field -->
<div class="form-group">
    {!! Form::label('tax_code_id', __('pwweb::localisation.tax.rates.singular')) !!}
    <p>{{ $location->rate->name }}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', __('pwweb::localisation.State')) !!}
    <p>{{ $location->state }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', __('pwweb::localisation.City')) !!}
    <p>{{ $location->city }}</p>
</div>

<!-- Zip Field -->
<div class="form-group">
    {!! Form::label('zip', __('pwweb::localisation.Postcode')) !!}
    <p>{{ $location->zip }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('pwweb::localisation.tax.locations.order')) !!}
    <p>{{ $location->order }}</p>
</div>
