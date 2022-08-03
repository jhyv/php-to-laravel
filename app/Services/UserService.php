<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    public function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }

    public function updateUser($input)
    {
        
    }
}