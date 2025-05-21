<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    protected UserServiceContract $userService;
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
        ]);

        $user = $this->userService->create($validatedData);

        return (new UserResource($user))
            ->additional(['message' => 'User created successfully'])
            ->response()
            ->setStatusCode(201);
    }
}
