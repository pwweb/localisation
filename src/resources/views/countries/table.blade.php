<div class="table-responsive-sm">
    <table class="table table-striped" id="countries-table">
        <thead>
            <tr>
                <th>@lang("pwweb::localisation.Name")</th>
                <th>@lang("pwweb::localisation.Iso code")</th>
                <th>@lang("pwweb::localisation.Ioc code")</th>
                <th>@lang("pwweb::localisation.Active")</th>
                <th colspan="3">@lang("pwweb::localisation.Action")</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->iso }}</td>
                <td>{{ $country->ioc }}</td>
                <td>{{ $country->active }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.countries.destroy', $country->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.countries.show', [$country->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.countries.edit', [$country->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
