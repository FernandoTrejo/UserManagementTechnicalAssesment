<?php

namespace App\Http\Controllers;

class FindUserByIDController extends Controller
{
    public function findUserByID($id)
    {
        $user = \App\Models\User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }
}
