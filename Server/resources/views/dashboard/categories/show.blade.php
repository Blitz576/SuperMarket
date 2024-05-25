@extends('dashboard.layouts.layout')
@section('page_title', 'Show Category')
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
                        <li class="active">Show Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header category-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $category->image_url }}">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6">{{ $category->name }}</h2>
                                        <p class="m1-2">{{ $category->status }} 
                                        @if ($category->status == 'available')
                                            <span class="badge badge-success"> </span>
                                        @else
                                            <span class="badge badge-danger"> </span>
                                        @endif
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-list mx-2"></i>Description : {{ $category->description }}</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-list mx-2"></i>Count Of Products Belong To This Category: {{ $category->products->count() }}</a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection
