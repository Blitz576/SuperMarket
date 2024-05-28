@extends('dashboard.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">{{ $product->category->name }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
@endsection
