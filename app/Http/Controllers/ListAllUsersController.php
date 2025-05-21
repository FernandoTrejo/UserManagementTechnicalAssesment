<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListAllUsersController extends Controller
{
    public function listAllUsers()
    {
        // Fetch all users from the database
        $users = \App\Models\User::all();

        // Return the list of users as a JSON response
        return response()->json($users, 200);
    }
}
