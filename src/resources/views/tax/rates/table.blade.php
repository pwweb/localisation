<div class="table-responsive-sm">
    <table class="table table-striped" id="rates-table">
        <thead>
            <tr>
                <th>{{__('pwweb::localisation.tax.rates.singular')}}</th>
                <th>{{__('pwweb::localisation.tax.rates.name')}}</th>
                <th>{{__('pwweb::localisation.tax.rates.compound')}}</th>
                <th>{{__('pwweb::localisation.tax.rates.shipping')}}</th>
                <th>{{__('pwweb::localisation.tax.rates.type')}}</th>
                <th>{{__('pwweb::localisation.Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rates as $rate)
            <tr>
                <td>{{ $rate->rate }}</td>
                <td>{{ $rate->name }}</td>
                <td>{{ \PWWEB\Core\Enums\Boolean::make((int) $rate->compound) }}</td>
                <td>{{ \PWWEB\Core\Enums\Boolean::make((int) $rate->shipping) }}</td>
                <td>{{ \PWWEB\Localisation\Enums\Tax\Type::make($rate->type) }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.tax.rates.destroy', $rate->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.tax.rates.show', [$rate->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.tax.rates.edit', [$rate->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
