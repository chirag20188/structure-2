@extends('admin.layouts.master')
    
@section('title')
    User
@endsection   

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <h5 class="page-title">Users</h5>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Users List
                                </h3>
                                <button class="btn btn-primary pull-right add-user">Add User</button>
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

    <!-- Add User modal -->
    <div class="modal fade bs-example-modal-lg" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="user-form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="Name" name="name" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" placeholder="Mobile" name="mobile" class=" form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" name="address" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" selected="">Active</option>
                                        <option value="0">In active</option>
                                    </select>
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
    </div>

    <!-- Edit Faq modal -->
    <div class="modal fade bs-example-modal-lg" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" method="post">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="Name" name="name" class="form-control" id="name" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control" id="email" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" placeholder="Mobile" name="mobile" class=" form-control" id="mobile" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" name="address" class="form-control" id="address" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control status">
                                        <option value="1">Active</option>
                                        <option value="0">In active</option>
                                    </select>
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
    </div>

@endsection

@section('js')

{!! $dataTable->scripts() !!}
<script type="text/javascript" src="{{ asset('admin-assets/js/admin/pages/user.js')}}"></script>

@endsection    