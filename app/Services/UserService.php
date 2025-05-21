<?php

namespace App\Services;

use App\Contracts\UserServiceContract;
use App\Models\User;

class UserService implements UserServiceContract
{
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::with('role')->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function findById(int $id)
    {
        return User::with('role')->findOrFail($id);
    }

    public function list(array $filters = [])
    {
        $query = User::query();
        if (!empty($filters['name'])) {
            $query->withName($filters['name']);
        }
        if (!empty($filters['email'])) {
            $query->withEmail($filters['email']);
        }
        return $query->with('role')->paginate(10);
    }
}
