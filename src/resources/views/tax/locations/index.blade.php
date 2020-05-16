@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">{{__('pwweb::localisation.tax.locations.plural')}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        {{__('pwweb::localisation.tax.locations.plural')}}
                        <a class="pull-right" href="{{ route('localisation.tax.locations.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                    </div>
                    <div class="card-body">
                        @include('localisation::tax.locations.table')
                        <div class="pull-right mr-3">

                            @include('coreui-templates::common.paginate', ['records' => $locations])

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
