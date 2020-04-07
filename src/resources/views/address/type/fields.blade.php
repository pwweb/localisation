<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Global Field -->
<div class="form-group col-sm-6">
    {!! Form::label('global', Lang::get('pwweb::localisation.Global')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('global', 0) !!}
        {!! Form::checkbox('global', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(Lang::get('pwweb::localisation.Save address type'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.address.type.index') }}" class="btn btn-secondary">@lang("pwweb::localisation.cancel")</a>
</div>
