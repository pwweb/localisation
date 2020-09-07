@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('localisation.tax.rates.index') }}">{{__('pwweb::localisation.tax.rates.singular')}}</a>
    </li>
    <li class="breadcrumb-item active">{{__('pwweb::localisation.detail')}}</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('pwweb::localisation.details') }}</strong>
                        <a href="{{ route('localisation.tax.rates.index') }}" class="btn btn-light">{{__('pwweb::localisation.back')}}</a>
                    </div>
                    <div class="card-body">
                        @include('localisation::tax.rates.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
