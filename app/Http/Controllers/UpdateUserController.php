<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8|confirmed',
            'phone_number' => 'sometimes|required|string|max:15',
        ]);

        $user = User::findOrFail($id);

        $user->update($validatedData);

        return (new UserResource($user))
            ->additional(['message' => 'User updated successfully'])
            ->response()
            ->setStatusCode(200);
    }
}
