<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getById($id);
    public function getByEmail($email);
    public function create(array $userData);
    public function update($id, array $userData);
    public function delete($id);
}