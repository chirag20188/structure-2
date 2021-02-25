@extends('admin.layouts.master')
    
@section('title')
    Cms create
@endsection   

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Add Cms</a></li>
                    </ol>
                </div>
                <h5 class="page-title">Add Cms</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form action="{{ route('admin.cms.store')}}" id="cms-form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="title" value="{{ old('title')}}" id="title" placeholder="Title">
                                        </div>
                                        <div class="text-danger">@error('title') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control" name="description" value="{{ old('description')}}"></textarea>
                                        </div>
                                        <div class="text-danger">@error('description') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group pull-right">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="{{ route('admin.cms.list')}}" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $('.ckeditor').ckeditor();
    </script>
    <script type="text/javascript" src="{{ asset('admin-assets/js/admin/pages/cms.js')}}"></script>
@endsection