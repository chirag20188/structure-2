@extends('admin.layouts.master')
    
@section('title')
    Dashboard
@endsection   

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-network float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">New Users</h6>
                    </div>
                    <div class="card-body">
                        <!-- <div class="border-bottom pb-4">
                                <span class="badge badge-success"> +22% </span> <span class="ml-2 text-muted">From previous period</span>
                        </div> -->
                        <div class="mt-4 text-muted">
                            <!-- <div class="float-right">
                                <p class="m-0">Last : 3426</p>
                            </div> -->
                            <h5 class="m-0">{{$users->count()}}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">New Orders</h6>
                    </div>
                    <div class="card-body">
                        <!-- <div class="border-bottom pb-4">
                            <span class="badge badge-success"> +11% </span> <span class="ml-2 text-muted">From previous period</span>
                        </div> -->
                        <div class="mt-4 text-muted">
                            <!-- <div class="float-right">
                                <p class="m-0">Last : 1325</p>
                            </div> -->
                            <h5 class="m-0">322<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-tag-text-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Average Price</h6>
                    </div>
                    <div class="card-body">
                       <!--  <div class="border-bottom pb-4">
                            <span class="badge badge-danger"> -02% </span> <span class="ml-2 text-muted">From previous period</span>
                        </div> -->
                        <div class="mt-4 text-muted">
                            <!-- <div class="float-right">
                                <p class="m-0">Last : 15.8</p>
                            </div> -->
                            <h5 class="m-0">14.5<i class="mdi mdi-arrow-down text-danger ml-2"></i></h5>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cart-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Sales</h6>
                    </div>
                    <div class="card-body">
                       <!--  <div class="border-bottom pb-4">
                            <span class="badge badge-success"> +10% </span> <span class="ml-2 text-muted">From previous period</span>
                        </div> -->
                        <div class="mt-4 text-muted">
                            <!-- <div class="float-right">
                                <p class="m-0">Last : 14256</p>
                            </div> -->
                            <h5 class="m-0">15234<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-8">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Email Sent</h4>

                        <ul class="list-inline widget-chart m-t-20 text-center">
                            <li>
                                <h4 class=""><b>3652</b></h4>
                                <p class="text-muted m-b-0">Marketplace</p>
                            </li>
                            <li>
                                <h4 class=""><b>5421</b></h4>
                                <p class="text-muted m-b-0">Last week</p>
                            </li>
                            <li>
                                <h4 class=""><b>9652</b></h4>
                                <p class="text-muted m-b-0">Last Month</p>
                            </li>
                        </ul>

                        <div id="morris-area-example" style="height: 300px"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Revenue</h4>

                        <ul class="list-inline widget-chart m-t-20 text-center">
                            <li>
                                <h4 class=""><b>5248</b></h4>
                                <p class="text-muted m-b-0">Marketplace</p>
                            </li>
                            <li>
                                <h4 class=""><b>321</b></h4>
                                <p class="text-muted m-b-0">Last week</p>
                            </li>
                            <li>
                                <h4 class=""><b>964</b></h4>
                                <p class="text-muted m-b-0">Last Month</p>
                            </li>
                        </ul>
                        <div id="morris-bar-example" style="height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                                <div id="morris-donut-example" class="morris-charts" style="height: 265px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Users</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                @if(count($users) > 0)
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users->take(10) as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>{{$user->status == 0 ? 'In active' : 'Active'}}</td>
                                                <td>{{date('Y-m-d h:i:s',strtotime($user->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else 
                                    <h6>No users right now.</h6>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection  

@section('js')
    <script src="{{ asset('admin-assets/pages/dashboard.js') }}"></script>
@endsection  

