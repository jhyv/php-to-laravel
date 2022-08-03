<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Get User from database
     *
     * @return view
     */
    public function getUser($id)
    {
        $user = (new UserService)->getUser($id);
        if(!$user)
            return response()->json("",404);

        return view('user',compact('user'));
    }

    /**
     * Update User's comment in the database
     *
     * @return response
     */
    public function updateUser(Request $request)
    {
        // Validate request parameters
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
