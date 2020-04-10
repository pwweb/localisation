<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Iso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso', Lang::get('pwweb::localisation.Iso Code')) !!}
    {!! Form::text('iso', null, ['class' => 'form-control']) !!}
</div>

<!-- Ioc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ioc', Lang::get('pwweb::localisation.Ioc Code')) !!}
    {!! Form::text('ioc', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', Lang::get('pwweb::localisation.Active')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('pwweb::localisation.Save country'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.countries.index') }}" class="btn btn-secondary">@lang("pwweb::localisation.cancel")</a>
</div>
