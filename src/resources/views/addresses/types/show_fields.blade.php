<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', Lang::get('pwweb::localisation.Name')) !!}
    <p>{{ $type->name }}</p>
</div>

<!-- Global Field -->
<div class="form-group">
    {!! Form::label('global', Lang::get('pwweb::localisation.Global')) !!}
    <p>{{ $type->global }}</p>
</div>
