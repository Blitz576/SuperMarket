@extends('dashboard.layouts.layout')
@section('page_title', 'categories List')
@section('styles')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Categories</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="active">List Of categories</li>
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
                                <strong class="col text-primary">Categories</strong>
                                <a href="{{ route('categories.create') }}" class="col-2 me-2 btn btn-outline-primary rounded">Add New Category</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('categories.index') }}" class="form-horizontal" method="get">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <input type="text" name="search" class="form-control" placeholder="Search about category by name">
                                            </div>
                                            <div class="col col-md-4">
                                                <button type="submit" class="btn btn-outline-primary rounded mx-1">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Cover Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($categories as $category)
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img class="align-self-center rounded-circle" src="{{ $category->image_url }}" alt="" height="60" width="60"></td>
                                        <td class="text-success fw-bold">{{ $category->name }}</td>
                                        <td>
                                            <select class="category-status form-control col-auto" data-category-id="{{ $category->id }}">
                                                <option value="available" {{ $category->status === 'available' ? 'selected' : '' }}>Available</option>
                                                <option value="unavailable" {{ $category->status === 'unavailable' ? 'selected' : '' }}>UnAvailable</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-success rounded p-2 mx-2">Show</a>
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning rounded p-2 mx-2">Edit</a>
                                                <form class="form-inline m-0" method="post" action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method ('delete')
                                                    <button type="submit" class="btn btn-outline-danger rounded p-2 mx-2 show_confirm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" style="font-size: 25px" colspan="6">
                                            No categories Found
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.category-status').on('change', function() {
                const categoryId = $(this).data('category-id');
                const newStatus = $(this).val();
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                console.log("Sending request with:", {
                    categoryId: categoryId,
                    status: newStatus,
                    _token: csrfToken
                });

                $.ajax({
                    url: "/categories/" + categoryId + "/change-status",
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
