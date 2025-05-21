<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceContract;
use App\Models\User;

class DeleteUserController extends Controller
{
    protected UserServiceContract $userService;
    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function deleteUser($id)
    {
        $this->userService->delete($id);

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
