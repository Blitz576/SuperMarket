@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <strong class="card-title">Products</strong>
        <a href="{{ route('products.create') }}" class="btn btn-dark">Add New Product</a>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        @for ($i = 1; $i <= $product->rating; $i++)
                            <i class="fa fa-star text-warning"></i>
                        @endfor
                    </td>
                    <th >{{$product->status}}</th>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
    </div>
</div>

@endsection
