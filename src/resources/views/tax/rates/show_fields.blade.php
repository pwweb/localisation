<!-- Rate Field -->
<div class="form-group">
    {!! Form::label('rate', __('pwweb::localisation.tax.rates.singular')) !!}
    <p>{{ $rate->rate }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('pwweb::localisation.tax.rates.name')) !!}
    <p>{{ $rate->name }}</p>
</div>

<!-- Compound Field -->
<div class="form-group">
    {!! Form::label('compound', __('pwweb::localisation.tax.rates.compound')) !!}
    <p>{{ $rate->compound }}</p>
</div>

<!-- Shipping Field -->
<div class="form-group">
    {!! Form::label('shipping', __('pwweb::localisation.tax.rates.shipping')) !!}
    <p>{{ $rate->shipping }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('pwweb::localisation.tax.rates.type')) !!}
    <p>{{ $rate->type }}</p>
</div>
