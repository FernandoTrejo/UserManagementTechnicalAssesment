<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    protected UserServiceContract $userService;
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8|confirmed',
            'phone_number' => 'sometimes|required|string|max:15',
        ]);

        $user = $this->userService->update($id, $validatedData);

        return (new UserResource($user))
            ->additional(['message' => 'User updated successfully'])
            ->response()
            ->setStatusCode(200);
    }
}
