@extends('dashboard.layouts.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('products.index') }}">products</a></li>
                        <li class="active">List Of products</li>
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
                            <strong class="card-title">Products</strong>
                            <a href="{{ route('products.create') }}" class="col-2 me-2 btn btn-outline-primary rounded">Add
                                New Product</a>

                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-success fw-bold">{{ $product->title }}</td>
                                            <td class="text-success fw-bold">{{ $product->category->name }}</td>
                                            <td class="text-success fw-bold">{{ $product->stock }}</td>
                                            <td class="">
                                                @if ($product->images->isNotEmpty())
                                                    <img width="80" height="80" src="{{ asset('images/' . $product->images->first()->image) }}"
                                                        alt="{{ $product->title }}">
                                                @endif
                                            </td>

                                            <td class="text-success fw-bold">
                                                @for ($i = 1; $i <= $product->rating; $i++)
                                                    <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </td>
                                            <th class="text-success fw-bold">{{ $product->status }}</th>

                                            <td>
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="btn btn-outline-success rounded p-2 mx-2">View</a>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-outline-warning rounded p-2 mx-2">Edit</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger rounded p-2 mx-2">Delete</button>
                                                </form>

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
@endsection
