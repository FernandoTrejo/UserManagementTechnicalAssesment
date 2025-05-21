<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ListAllUsersController extends Controller
{
    public function listAllUsers(Request $request)
    {
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->paginate(10);

        return UserResource::collection($users);
    }
}
