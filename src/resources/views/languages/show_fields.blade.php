<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    <p>{{ $language->name }}</p>
</div>

<!-- Locale Field -->
<div class="form-group">
    {!! Form::label('locale', Lang::get('pwweb::localisation.Locale')) !!}
    <p>{{ $language->locale }}</p>
</div>

<!-- Abbreviation Field -->
<div class="form-group">
    {!! Form::label('abbreviation', Lang::get('pwweb::localisation.Abbreviation')) !!}
    <p>{{ $language->abbreviation }}</p>
</div>

<!-- Installed Field -->
<div class="form-group">
    {!! Form::label('installed', Lang::get('pwweb::localisation.Installed')) !!}
    <p>{{ $language->installed }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', Lang::get('pwweb::localisation.Active')) !!}
    <p>{{ $language->active }}</p>
</div>

<!-- Standard Field -->
<div class="form-group">
    {!! Form::label('standard', Lang::get('pwweb::localisation.Standard')) !!}
    <p>{{ $language->standard }}</p>
</div>
