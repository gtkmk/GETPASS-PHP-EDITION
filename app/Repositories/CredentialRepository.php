<?php

namespace App\Repositories;

use App\Models\Credential;

class CredentialRepository implements CredentialRepositoryInterface
{
    public function create(array $data): Credential
    {
        return Credential::create($data);
    }

    public function update(array $data, Credential $credential): Credential
    {
        $credential->update($data);
        return $credential;
    }

    public function delete(Credential $credential): bool
    {
        return $credential->delete();
    }

    public function getAllByUser(int $userId): array
    {
        return Credential::where('user_id', $userId)->get()->toArray();
    }

    public function getByIdAndUser(int $id, int $userId): ?Credential
    {
        return Credential::where('id', $id)->where('user_id', $userId)->first();
    }
}