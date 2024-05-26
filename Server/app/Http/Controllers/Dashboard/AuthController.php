<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user->password = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->gender = $request->gender;
        $user->image="default.jfif";
        $user->role = 'administrator';
        $user->status = $request->status ?? 'available';
        $user->save();

        return redirect()->route('login');
    }
}
