@extends('dashboard.layouts.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Orders</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('orders.index') }}">Orders</a></li>
                        <li class="active">List Of Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title">Orders</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Total Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td data-toggle="collapse" data-target="#collapse{{ $order->id }}"
                                                    aria-expanded="false" aria-controls="collapse{{ $order->id }}"><i
                                                        class="fa fa-plus"></i></td>
                                                <td class="text-success fw-bold">{{ $order->user->name }}</td>
                                                <td class="text-success fw-bold">
                                                    <select class="order-status form-control col-auto"
                                                        data-order-id="{{ $order->id }}">
                                                        <option value="pending"
                                                            {{ $order->status === 'pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                        <option value="paid"
                                                            {{ $order->status === 'paid' ? 'selected' : '' }}>paid</option>
                                                        <option value="processing"
                                                            {{ $order->status === 'processing' ? 'selected' : '' }}>
                                                            processing</option>
                                                        <option value="shipped"
                                                            {{ $order->status === 'shipped' ? 'selected' : '' }}>shipped
                                                        </option>
                                                        <option value="completed"
                                                            {{ $order->status === 'completed' ? 'selected' : '' }}>completed
                                                        </option>
                                                        <option value="cancelled"
                                                            {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                                            cancelled</option>
                                                        <option value="rejected"
                                                            {{ $order->status === 'rejected' ? 'selected' : '' }}>rejected
                                                        </option>
                                                        <option value="refunded"
                                                            {{ $order->status === 'refunded' ? 'selected' : '' }}>refunded
                                                        </option>

                                                    </select>
                                                </td>
                                                <td class="text-success fw-bold">{{ $order->notes }}</td>
                                                <td class="text-success fw-bold">{{ $order->total_price }}</td>
                                                <td>
                                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger rounded p-2 mx-2">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr id="collapse{{ $order->id }}" class="collapse">
                                                <td colspan="6">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Item Name</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->orderItems as $item)
                                                                <tr>
                                                                    <td class="text-success fw-bold">
                                                                        {{ $item->product->title }}</td>
                                                                    <td class="text-success fw-bold">{{ $item->quantity }}
                                                                    </td>
                                                                    <td class="text-success fw-bold">{{ $item->price }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.order-status').on('change', function() {
                const orderId = $(this).data('order-id');
                const newStatus = $(this).val();
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                console.log("Sending request with:", {
                    orderId: orderId,
                    status: newStatus,
                    _token: csrfToken
                });

                $.ajax({
                    url: "/orders/" + orderId + "/change-status",
                    type: "POST",
                    data: {
                        status: newStatus,
                        _token: csrfToken
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        console.log("Success response:", response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error updating status:", textStatus, errorThrown);
                        toastr.error("Failed to update status.");
                        console.log("Error response:", jqXHR.responseText);
                    }
                });
            });
        });
    </script>
@endsection
