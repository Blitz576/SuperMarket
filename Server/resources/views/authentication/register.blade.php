
           @extends('dashboard.layouts.authLayout')
           @section('form')
           <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="email" class="form-control" placeholder="User Name" name="name">
                        </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name=email>
                        </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="phone">
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
                        </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                 
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="#"> Sign in</a></p>
                                    </div>
                    </form>
               @endsection