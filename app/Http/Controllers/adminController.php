<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin-panel.users', compact('users'));
    }
    public function deleteUser($id)
    {
        $review = User::find($id);
        $review->delete();
        return back();
    }
    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->update([
            'role' => 'admin'
        ]);
        return back();
    }
public function showUser($id){
    $user=User::find($id);
    return view('admin-panel.user-detail',compact('user'));
}
}
