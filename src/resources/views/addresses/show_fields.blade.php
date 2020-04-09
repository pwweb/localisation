<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', Lang::get('pwweb::localisation.Country')) !!}
    <p>{{ $address->country_id }}</p>
</div>

<!-- Type Id Field -->
<div class="form-group">
    {!! Form::label('type_id', Lang::get('pwweb::localisation.Type')) !!}
    <p>{{ $address->type_id }}</p>
</div>

<!-- Street Field -->
<div class="form-group">
    {!! Form::label('street', Lang::get('pwweb::localisation.Street')) !!}
    <p>{{ $address->street }}</p>
</div>

<!-- Street2 Field -->
<div class="form-group">
    {!! Form::label('street2', Lang::get('pwweb::localisation.Street 2')) !!}
    <p>{{ $address->street2 }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', Lang::get('pwweb::localisation.City')) !!}
    <p>{{ $address->city }}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', Lang::get('pwweb::localisation.State')) !!}
    <p>{{ $address->state }}</p>
</div>

<!-- Postcode Field -->
<div class="form-group">
    {!! Form::label('postcode', Lang::get('pwweb::localisation.Postcode')) !!}
    <p>{{ $address->postcode }}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', Lang::get('pwweb::localisation.Latitude')) !!}
    <p>{{ $address->lat }}</p>
</div>

<!-- Lng Field -->
<div class="form-group">
    {!! Form::label('lng', Lang::get('pwweb::localisation.Longitude')) !!}
    <p>{{ $address->lng }}</p>
</div>

<!-- Primary Field -->
<div class="form-group">
    {!! Form::label('primary', Lang::get('pwweb::localisation.Primary')) !!}
    <p>{{ $address->primary }}</p>
</div>
