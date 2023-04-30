@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="col-md-12 me-xl-5">
        <h2>Dashboard,</h2>
        <p class="mb-md-0">Your analytics template</p>
      </div>
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-primary text-white mb-3">
              <label for="">Total Orders</label>
              <h1>{{$totalOrder}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-success text-white mb-3">
              <label for="">Today Orders</label>
              <h1>{{$todayOrder}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-danger text-white mb-3">
              <label for="">This Month Orders</label>
              <h1>{{$thisMonthOrder}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-warning text-white mb-3">
              <label for="">This Year Orders</label>
              <h1>{{$thisYearOrder}}</h1>
            </div>
          </a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-primary text-white mb-3">
              <label for="">Total Products</label>
              <h1>{{$totalProducts}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-success text-white mb-3">
              <label for="">Total Categories</label>
              <h1>{{$totalCategories}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-danger text-white mb-3">
              <label for="">Total Brands</label>
              <h1>{{$totalBrands}}</h1>
            </div>
          </a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-primary text-white mb-3">
              <label for="">Total All Users</label>
              <h1>{{$totalAllUsers}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-success text-white mb-3">
              <label for="">Total Users</label>
              <h1>{{$totalUser}}</h1>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('admin/orders') }}" class="text-white text-decoration-none">
            <div class="card card-body bg-danger text-white mb-3">
              <label for="">Total Admins</label>
              <h1>{{$totalAdmin}}</h1>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
