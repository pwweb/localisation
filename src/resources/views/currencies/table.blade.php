<div class="table-responsive-sm">
    <table class="table table-striped" id="currencies-table">
        <thead>
            <tr>
                <th>@lang("pwweb::localisation.Name")</th>
                <th>@lang("pwweb::localisation.Iso code")</th>
                <th>@lang("pwweb::localisation.Numeric code")</th>
                <th>@lang("pwweb::localisation.Entity code")</th>
                <th>@lang("pwweb::localisation.Active")</th>
                <th>@lang("pwweb::localisation.Standard")</th>
                <th colspan="3">@lang("pwweb::localisation.Action")</th>
            </tr>
        </thead>
        <tbody>
        @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency->name }}</td>
                <td>{{ $currency->iso }}</td>
                <td>{{ $currency->numeric_code }}</td>
                <td>{{ $currency->entity_code }}</td>
                <td>{{ $currency->active }}</td>
                <td>{{ $currency->standard }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.currencies.destroy', $currency->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.currencies.show', [$currency->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.currencies.edit', [$currency->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
