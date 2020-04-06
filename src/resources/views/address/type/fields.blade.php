<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Global Field -->
<div class="form-group col-sm-6">
    {!! Form::label('global', Lang::get('pwweb.localisation.Global')) !!}
    <label class="checkbox-inline">
        {!! Form::hidden('global', 0) !!}
        {!! Form::checkbox('global', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('localisation.address.type.index') }}" class="btn btn-secondary">Cancel</a>
</div>
