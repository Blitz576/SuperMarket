@extends('dashboard.layouts.layout')
@section('page_title', 'Show User')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Users</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="active">Show User</li>
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
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $user->image_url }}">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6">{{ $user->name }}</h2>
                                        <p class="m1-2">{{ $user->status }} 
                                        @if ($user->status == 'available')
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
                                    <a href="mailto:{{ $user->email }}"> <i class="fa fa-envelope-o mx-2"></i>{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="tel:{{ $user->mobile_number }}"> <i class="fa fa-phone mx-2"></i> {{ $user->mobile_number ?? '000 000 0000' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa  fa-group mx-2"></i>Role : {{ $user->role }} </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-calendar-o mx-2"></i>Joined At : {{ $user->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}</a>
                                </li>
                            </ul>

                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection
