@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row g-4">
        <div class="col-sm-6 col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h5 class="card-title">1,234</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h5 class="card-title">567</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card text-white bg-info h-100">
                <div class="card-header">Recent Orders</div>
                <div class="card-body">
                    <h5 class="card-title">89</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
