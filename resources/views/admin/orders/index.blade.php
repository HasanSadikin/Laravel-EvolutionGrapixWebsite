@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')
  <div class="py-3 py-md-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3>
                My Orders
                <a href="{{ url('admin/dashboard') }}" class="btn btn-primary text-white btn-sm float-end">Back</a>
              </h3>
            </div>
            <div class="card-body">
              <form action="" method="GET">
                <div class="row">
                  <div class="col-md-3">
                    <label for="">Filter By Date</label>
                    <input type="date" name="date" value={{Request::get('date') ?? date('Y-m-d')}} class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for="">Filter By Status</label>
                    <select name="status" id="" class="form-select">
                      <option value="">Select Status</option>
                      <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected' : ''}} >In Progress</option>
                      <option value="completed" {{Request::get('status') == 'completed' ? 'selected' : ''}} >Completed</option>
                      <option value="pending" {{Request::get('status') == 'pending' ? 'selected' : ''}} >Pending</option>
                      <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected' : ''}} >Cancelled</option>
                      <option value="out-for-delivery" {{Request::get('status') == 'out-for-delivery' ? 'selected' : ''}} >Out For Delivery</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <br/>
                    <button type="submit" class="btn btn-primary text-white">Filter</button>
                  </div>
                </div>
              </form>
              <hr>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Tracking No</th>
                      <th>Username</th>
                      <th>Payment Mode</th>
                      <th>Ordered Date</th>
                      <th>Status Message</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $order)
                      <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->tracking_no }}</td>
                        <td>{{ $order->fullname }}</td>
                        <td>{{ $order->payment_mode }}</td>
                        <td>{{ $order->created_at->format('d-m-y') }}</td>
                        <td>{{ $order->status_message }}</td>
                        <td><a href="{{ url('admin/orders/' . $order->id) }}" class="btn btn-primary btn-sm text-white">View</a></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="7">No Orders Available</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                <div class="">
                  {{ $orders->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
