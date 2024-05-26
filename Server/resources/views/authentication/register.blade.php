
           @extends('dashboard.layouts.authLayout')
           @section('form')
           <div class="login-form">
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name=email>
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
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="mobile_number">
                            @error('mobile_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="male"> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="female"> Female
                                </label>
                            </div>
                            @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                        </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                 
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="{{ route('login')}}"> Sign in</a></p>
                                    </div>
                    </form>
               @endsection