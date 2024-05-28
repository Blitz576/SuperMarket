@extends('dashboard.layouts.authLayout')
@section('form')
    <div class="login-form">

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                <label class="pull-right">
                    <a href="#">Forgotten Password?</a>
                </label>

            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

            <div class="register-link m-t-15 text-center">
                <p>Don't have account ? <a href="{{ route('register')}}"> Sign Up Here</a></p>
            </div>
        </form>
    @endsection
