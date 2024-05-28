@extends('dashboard.layouts.layout')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Products</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="active">Show Product</li>
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
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <strong class="col text-primary">Show Product '{{ $product->title }}'</strong>
                                <a href="{{ route('products.index') }}" class="col-2 me-2 btn btn-outline-warning rounded">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach ($product->images as $image)
                                    <div class="col-md-3 mb-3">
                                        <img class="img-fluid rounded" src="{{ asset('images/' . $image->image) }}" alt="Product Image">
                                    </div>
                                @endforeach
                            </div>
                            <h5 class="text-center mt-2 mb-1">{{ $product->title }}</h5>
                            <div class="text-center mt-2 mb-1">{{ $product->description }}</div>
                            <div class="text-center">Stock: {{ $product->stock }} {{ Str::plural('piece', $product->stock) }}</div>
                            <p class="text-center mt-2 mb-1">Price: {{ $product->price }} $</p>
                            <hr>
                            <div class="card-text text-center">
                                @for ($i = 1; $i <= $product->rating; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
