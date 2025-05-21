<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Http\Resources\UserResource;
class FindUserByIDController extends Controller
{
    protected UserServiceContract $userService;
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function findUserByID($id)
    {
        $user = $this->userService->findById($id);

        return new UserResource($user);
    }
}
