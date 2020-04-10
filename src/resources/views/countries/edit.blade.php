@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('localisation.countries.index') !!}">@lang("pwweb::localisation.Countries")</a>
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
                              <strong>@lang("pwweb::localisation.Edit country")</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($country, ['route' => ['localisation.countries.update', $country->id], 'method' => 'patch']) !!}

                              @include('localisation::countries.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
