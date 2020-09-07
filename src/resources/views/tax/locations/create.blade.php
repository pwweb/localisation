@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{!! route('localisation.tax.locations.index') !!}">{{__('pwweb::localisation.tax.locations.singular')}}</a>
    </li>
    <li class="breadcrumb-item active">{{__('pwweb::localisation.create')}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-square-o fa-lg"></i>
                        <strong>{{__('pwweb::localisation.tax.locations.create_location')}}</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'localisation.tax.locations.store']) !!}

                        @include('localisation::tax.locations.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
