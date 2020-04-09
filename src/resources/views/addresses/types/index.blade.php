@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang("pwweb::localisation.Address type")</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang("pwweb::localisation.Address types")
                             <a class="pull-right" href="{{ route('localisation.address.types.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                            @include('localisation::addresses.types.table')
                            <div class="pull-right mr-3">

                            </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
