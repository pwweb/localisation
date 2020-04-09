<div class="table-responsive-sm">
    <table class="table table-striped" id="languages-table">
        <thead>
            <tr>
                <th>@lang("pwweb::localisation.Name")</th>
                <th>@lang("pwweb::localisation.Locale")</th>
                <th>@lang("pwweb::localisation.Abbreviation")</th>
                <th>@lang("pwweb::localisation.Installed")</th>
                <th>@lang("pwweb::localisation.Active")</th>
                <th>@lang("pwweb::localisation.Standard")</th>
                <th colspan="3">@lang("pwweb::localisation.Action")</th>
            </tr>
        </thead>
        <tbody>
        @foreach($languages as $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>{{ $language->locale }}</td>
                <td>{{ $language->abbreviation }}</td>
                <td>{{ $language->installed }}</td>
                <td>{{ $language->active }}</td>
                <td>{{ $language->standard }}</td>
                <td>
                    {!! Form::open(['route' => ['localisation.languages.destroy', $language->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('localisation.languages.show', [$language->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('localisation.languages.edit', [$language->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
