<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyEmailResponse extends Controller
{
    <?php

namespace App\Http\Controllers;

class VerifyEmailResponse
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->role == 'admin') {
            return redirect('/dashboard');
        }

        if ($user->role == 'user') {
            return redirect('/user/dashboard');
        }

        return redirect('/login');
    }
}
}