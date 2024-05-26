<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('authentication.register');
    }
    public function registerPost(request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->mobile_number = $request->mobile_number;
        $user->gender = $request->gender;
        $user->image="default.jfif";
        $user->status = $request->status ?? 'available';
        $user->save();

        return redirect()->route('login');
    }
    public function login(){
        return view('authentication.login');
    }
    public function loginPost(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();
    if (!$user) {
        return back()->withErrors(['email' => 'User does not exist']);
    }

    if (Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
        return redirect()->intended(route('products.index'));
    } else {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

}
