<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListAllUsersController extends Controller
{
    public function listAllUsers(Request $request)
    {
        $users = User::query()
            ->when($request->name, fn($q) => $q->where('name', 'like', '%' . $request->name . '%'))
            ->when($request->email, fn($q) => $q->where('email', 'like', '%' . $request->email . '%'))
            ->paginate(10);

        return response()->json($users, 200);
    }
}
