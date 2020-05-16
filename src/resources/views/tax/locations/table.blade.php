<div class="table-responsive-sm">
    <table class="table table-striped" id="locations-table">
        <thead>
            <tr>
                <th>{{__('pwweb::localisation.Country')}}</th>
                <th>{{__('pwweb::localisation.tax.rates.singular')}}</th>
                <th>{{__('pwweb::localisation.State')}}</th>
                <th>{{__('pwweb::localisation.City')}}</th>
                <th>{{__('pwweb::localisation.Postcode')}}</th>
                <th>{{__('pwweb::localisation.tax.locations.order')}}</th>
                <th>{{__('pwweb::localisation.Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->country->name }}</td>
                <td>{{ $location->rate->name }}</td>
                <td>{{ $location->state }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->zip }}</td>
                <td>{{ $location->order }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.tax.locations.destroy', $location->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.tax.locations.show', [$location->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.tax.locations.edit', [$location->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
