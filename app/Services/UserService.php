<?php

namespace App\Services;
use App\Models\User;
use DB;

class UserService
{
    private $password = "720DF6C2482218518FA20FDC52D4DED7ECC043AB";

    /**
     * Get User record from the database
     *
     * @return User
     */
    public function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Update User record in the database
     *
     * @return User
     */

    public function updateUser($input)
    {
        // Check if password from request matches password in the class
        if($input['password'] == $this->password)
        {
            // Updates user's record
            $response = DB::transaction(function()use($input){
                $user = $this->getUser($input['id']);
                $user->comments .= "\n".$input['comments'];
                $user->save(); 

                return true;
            });

            return $response;
        }

        return response()->json([
            'success' => false,
            'message' => 'User was not updated. Please try again later'
        ],401);
    }
}