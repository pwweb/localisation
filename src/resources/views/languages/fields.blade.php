<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Locale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('locale', Lang::get('pwweb::localisation.Locale')) !!}
    {!! Form::text('locale', null, ['class' => 'form-control']) !!}
</div>

<!-- Abbreviation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abbreviation', Lang::get('pwweb::localisation.Abbreviation')) !!}
    {!! Form::text('abbreviation', null, ['class' => 'form-control']) !!}
</div>

<!-- Installed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('installed', Lang::get('pwweb::localisation.Installed')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('installed', 0) !!}
        {!! Form::checkbox('installed', '1', null) !!}
    </label>
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
    {!! Form::submit(Lang::get('pwweb::localisation.Save language'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.languages.index') }}" class="btn btn-secondary">@lang("pwweb::localisation.cancel")</a>
</div>
