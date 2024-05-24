
@extends('layouts.layout')

@section('content')

<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">{{$product->category->name}}</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="rounded mx-auto d-block" src="{{ asset('images/' . $image->image) }}" alt="Card image" width="200" height="150">
                <h5 class="text-sm-center mt-2 mb-1">{{$product->title}}</h5>
                <div class="text-sm-center  mt-2 mb-1">{{$product->description}}</div>
                <div class="text-sm-center ">Stock: {{$product->stock}} {{ Str::plural('piece', $product->stock) }} </div>
                <p class="text-sm-center mt-2 mb-1">Price: {{$product->price}} $</p>
            </div>
            <hr>
            <div class="card-text text-sm-center">
                @for ($i = 1; $i <= $product->rating; $i++)
                    <i class="fa fa-star text-warning"></i>
                @endfor
            </div>
        </div>
    </div>
</div>

@endsection
