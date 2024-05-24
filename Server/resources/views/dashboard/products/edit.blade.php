@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <strong class="card-title">Add new product</strong>
        </div>
        <div class="card-body">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post"
                            novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Name</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    value="{{ $product->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label mb-1">Description</label>
                                <input id="description" name="description" type="text" class="form-control"
                                    value="{{ $product->description }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="images" class="control-label mb-1">Images</label>
                                <input id="images" name="images[]" type="file" class="form-control" multiple>
                                @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stock" class="control-label mb-1">Category</label>
                                        <select class="form-control" name="category">
                                            <option disabled>Choose category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" 
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rate" class="control-label mb-1">Rate</label>
                                        <input id="rate" name="rate" type="number" class="form-control"
                                            value="{{ $product->rating }}">
                                        @error('rate')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price" class="control-label mb-1">Price</label>
                                        <input id="price" name="price" type="number" class="form-control"
                                            value="{{ $product->price }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stock" class="control-label mb-1">Stock</label>
                                        <input id="stock" name="stock" type="number" class="form-control"
                                            value="{{ $product->stock }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="slider" id="inlineRadio1"
                                    value="show" {{ $product->show_in_slider == 'show' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Show in slider</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="slider" id="inlineRadio2"
                                    value="hide" {{ $product->show_in_slider == 'hide' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Hide from slider</label>
                            </div>
                    </div>
                    <div>
                        <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="Edit">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
