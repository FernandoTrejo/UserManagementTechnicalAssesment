<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ListAllUsersController extends Controller
{
    protected UserServiceContract $userService;
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }
    public function listAllUsers(Request $request)
    {
        $filters = $request->only(['name', 'email']);
        $users = $this->userService->list($filters);

        return UserResource::collection($users);
    }
}
