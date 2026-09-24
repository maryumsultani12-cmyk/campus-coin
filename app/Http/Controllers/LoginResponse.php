<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
 public function toResponse($request){

   $user = $request->user();
    if (strtolower($user->role) === 'admin') {
                return redirect('/admin');
            }

            if(strtolower($user->role) === 'user') {
                return redirect('/user');
            }
                return redirect('/login');
 }

 public function Logout(Request $request){
    auth()->logout(); 
return redirect('/login')->with('error', 'Unauthorized role.');

}
};