<?php

namespace App\Services;

use App\Contracts\UserServiceContract;
use App\Models\User;

class UserService implements UserServiceContract
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        $user = User::findOrFail($id);
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
        return User::findOrFail($id);
    }

    public function list(array $filters = [])
    {
        $query = User::query();
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%'.$filters['name'].'%');
        }
        if (!empty($filters['email'])) {
            $query->where('email', 'like', '%'.$filters['email'].'%');
        }
        return $query->paginate(10);
    }
}
