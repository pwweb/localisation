@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('localisation.languages.index') !!}">@lang("pwweb::localisation.Addresses")</a>
          </li>
          <li class="breadcrumb-item active">@lang("pwweb::localisation.edit")</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang("pwweb::localisation.Edit language")</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($language, ['route' => ['localisation.languages.update', $language->id], 'method' => 'patch']) !!}

                              @include('localisation::languages.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
