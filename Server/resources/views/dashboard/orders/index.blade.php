@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <strong class="card-title">Orders</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-dark">
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
                    <th>
                        <a href="javascript:void(0);" onclick="toggleOrderItems({{ $order->id }})">{{ $order->id }}</a>
                    </th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->notes }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
