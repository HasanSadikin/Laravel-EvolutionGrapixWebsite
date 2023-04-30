@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-md-12">

      @if ($errors->any())
        <div class="alert alert-danger mb-3">
          @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</li>
          @endforeach
        </div>
      @endif
      @if (session('message'))
        <div class="alert alert-success mb-3">{{ session('message') }}</div>
      @endif

      <div class="card">
        <div class="card-header">
          <h3>
            Order Detail
            <a href="{{ url('admin/orders') }}" class="btn btn-danger text-white btn-sm float-end mx-1">Back</a>
            <a href="{{ url('admin/invoice/' . $order->id . '/generate') }}"
              class="btn btn-primary text-white btn-sm float-end mx-1">
              Download Invoice
            </a>
            <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
              class="btn btn-warning btn-sm float-end mx-1">
              View Invoice
            </a>
            <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}" class="btn btn-info btn-sm float-end mx-1">
              Send Invoice Via Mail
            </a>
          </h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5>Order Details</h5>
              <hr>
              <h6>Order ID: {{ $order->id }}</h6>
              <h6>Tracking ID/No: {{ $order->tracking_no }}</h6>
              <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
              <h6>Payment Mode: {{ $order->payment_mode }}</h6>
              <h6 class="border p-2 text success">
                Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
              </h6>
            </div>
            <div class="col-md-6">
              <h5>User Details</h5>
              <hr>
              <h6>Full Name: {{ $order->fullname }}</h6>
              <h6>Email: {{ $order->email }}</h6>
              <h6>Phone: {{ $order->phone }}</h6>
              <h6>Address: {{ $order->address }}</h6>
              <h6>Pin Code: {{ $order->pincode }}</h6>
            </div>
          </div>
          <br />
          <h5>Order Items</h5>
          <hr>
          @php
            $totalPrice = 0;
          @endphp
          @if ($order->orderItems->count() > 0)
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Image</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($order->orderItems as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                      @if ($item->product->productImages)
                        <img src="{{ asset($item->product->productImages[0]->image) }}" style="width: 50px; height: 50px"
                          alt=" {{ $item->product->name }}">
                      @else
                        <img src="" style="width: 50px; height: 50px" alt="">
                      @endif
                    </td>
                    <td>{{ $item->product->name }}</td>
                    <td>Rp. {{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="fw-bold">Rp. {{ $item->quantity * $item->price }}</td>
                    @php
                      $totalPrice += $item->quantity * $item->price;
                    @endphp
                  </tr>
                @empty
                  <tr>
                    <td colspan="7">No Orders Available</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          @endif
          @if ($order->serviceOrderItems->count() > 0)
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Item ID</th>
                  <th>Reference Image</th>
                  <th>Service</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($order->serviceOrderItems as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                      @if ($item->reference_image)
                        <img src="{{ asset($item->reference_image) }}" style="width: 50px; height: 50px"
                          alt=" {{ $item->service->name }}">
                      @else
                        <img src="" style="width: 50px; height: 50px" alt="">
                      @endif
                    </td>
                    <td>{{ $item->service->name }}</td>
                    <td>Rp. {{ $item->cost_per_meter }}</td>
                    <td>{{ $item->meter }}</td>
                    <td class="fw-bold">Rp. {{ $item->meter * $item->cost_per_meter }}</td>
                    @php
                      $totalPrice += $item->meter * $item->cost_per_meter;
                    @endphp
                  </tr>
                @empty
                  <tr>
                    <td colspan="7">No Service Orders Available</td>
                  </tr>
                @endforelse
                <tr>
                  <td colspan="5" class="fw-bold">Total Amount</td>
                  <td colspan="1" class="fw-bold">Rp. {{ $totalPrice }}</td>
                </tr>
              </tbody>
            </table>
          @endif
        </div>
      </div>
      <div class="card border mt-3">
        <div class="card-body">
          <h4>Order Process (Order Status Update)</h4>
          <hr>
          <div class="row">
            <div class="col-md-5">
              <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="">Update Your Order Status</label>
                <div class="input-group">
                  <select name="order_status" id="">
                    <option value="">Select Status</option>
                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In
                      Progress</option>
                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed
                    </option>
                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                    </option>
                    <option value="out-for-delivery"
                      {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out For Delivery</option>

                  </select>
                  <button type="submit" class="btn btn-primary text-white">Update</button>
                </div>
              </form>
            </div>
            <div class="col-md-7">
              <br />
              <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
