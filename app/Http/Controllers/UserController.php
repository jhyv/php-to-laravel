<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser($id)
    {
        $user = User::findOrFail($id);

        return view('user',compact('user'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
            'comments' => 'required'
        ]);

        return redirect()->url('/user/'.$request->id);
    }
}
