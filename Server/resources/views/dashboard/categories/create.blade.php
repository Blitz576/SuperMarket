@extends('dashboard.layouts.layout')
@section('page_title', 'Create Category')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>categories</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('categories.index') }}">categories</a></li>
                        <li class="active">Add new category</li>
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
                                <strong class="col text-primary">Add new category</strong>
                                <a href="{{ route('categories.index') }}" class="col-2 me-2 btn btn-outline-warning rounded">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form form-vertical" method="post"
                                  action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                @csrf
                                @include('dashboard.categories.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
