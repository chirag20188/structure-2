@extends('admin.layouts.master')

@section('title')
    Image Upload
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Image Upload</li>
                    </ol>
                </div>
                <h5 class="page-title">Image Upload</h5>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Image Upload List
                                </h3>
                                <button class="btn btn-primary pull-right add-image">Add Image</button>
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

    <!-- Add Faq modal -->
    <div class="modal fade bs-example-modal-center"  id="imageModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="image-form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Add Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image Upload<small>(Ex: jpg,jpeg,png,svg)</small></strong>
                                    <input type="file" name="image" onchange="preview_image(this);" data-id="image"  class="form-control">
                                </div>
                                <div class="image"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Faq modal -->
    <div class="modal fade bs-example-modal-center"  id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="edit-image-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Edit Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image Upload<small>(Ex: jpg,jpeg,png,svg)</small></strong>
                                    <input type="file" name="image" onchange="preview_image(this);" data-id="image" class="form-control">
                                </div>
                                <div class="image"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')

{!! $dataTable->scripts() !!}
<script type="text/javascript" src="{{ asset('admin-assets/js/admin/pages/image.js')}}"></script>
@endsection
