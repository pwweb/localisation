@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('localisation.languages.index') }}">@lang("pwweb::localisation.Languages")</a>
            </li>
            <li class="breadcrumb-item active">@lang("pwweb::localisation.detail")</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang("pwweb::localisation.details")</strong>
                                  <a href="{{ route('localisation.languages.index') }}" class="btn btn-light">@lang("pwweb::localisation.back")</a>
                             </div>
                             <div class="card-body">
                                 @include('localisation::languages.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
