<div class="table-responsive-sm">
    <table class="table table-striped" id="addresses-table">
        <thead>
            <tr>
                <th>@lang("pwweb::localisation.Country")</th>
                <th>@lang("pwweb::localisation.Type")</th>
                <th>@lang("pwweb::localisation.Street")</th>
                <th>@lang("pwweb::localisation.Street 2")</th>
                <th>@lang("pwweb::localisation.City")</th>
                <th>@lang("pwweb::localisation.State")</th>
                <th>@lang("pwweb::localisation.Postcode")</th>
                <th>@lang("pwweb::localisation.Latitude")</th>
                <th>@lang("pwweb::localisation.Longitude")</th>
                <th>@lang("pwweb::localisation.Primary")</th>
                <th colspan="3">@lang("pwweb::localisation.Action")</th>
            </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{{ $address->country_id }}</td>
                <td>{{ $address->type_id }}</td>
                <td>{{ $address->street }}</td>
                <td>{{ $address->street2 }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->state }}</td>
                <td>{{ $address->postcode }}</td>
                <td>{{ $address->lat }}</td>
                <td>{{ $address->lng }}</td>
                <td>{{ $address->primary }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.addresses.destroy', $address->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.addresses.show', [$address->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.addresses.edit', [$address->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
