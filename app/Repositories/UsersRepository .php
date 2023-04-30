<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository implements UserRepositoryInterface
{
    public function getById($id)
    {
        return User::find($id);
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function create(array $userData)
    {
        return User::create($userData);
    }

    public function update($id, array $userData)
    {
        $user = User::find($id);
        $user->update($userData);
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        return $user->delete();
    }
}