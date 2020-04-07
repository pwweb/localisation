@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('localisation.address.index') !!}">@lang("pwweb::localisation.Addresses")</a>
      </li>
      <li class="breadcrumb-item active">@lang("pwweb::localisation.create")</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang("pwweb::localisation.Create address")</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'localisation.address.store']) !!}

                                   @include('localisation::address.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
