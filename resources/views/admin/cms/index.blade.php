@extends('admin.layouts.master')

@section('title')
    Cms
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Cms</li>
                    </ol>
                </div>
                <h5 class="page-title">Cms</h5>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Cms List
                                </h3>
                                <a href="{{ route('admin.cms.create') }}" class="btn btn-primary pull-right">Add Cms</a>
                            </div>
                            <div class="card-body">
                                {!! $dataTable->table(['class' => 'table table-bordered table-hover dataTable dtr-inline'])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
@endsection

@section('js')

{!! $dataTable->scripts() !!}
<script type="text/javascript" src="{{ asset('admin-assets/js/admin/pages/cms.js')}}"></script>
@endsection
