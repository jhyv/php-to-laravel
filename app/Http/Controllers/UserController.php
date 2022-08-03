<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function getUser($id)
    {
        $user = (new UserService)->getUser($id);

        return view('user',compact('user'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'password' => 'required',
            'comments' => 'required'
        ]);

        $response = (new UserService)->updateUser($request->all());

        return $response === true ? response()->json([
            'success' => true,
            'message' => 'User updated successfully'
        ],200) : $response;
    }
}
