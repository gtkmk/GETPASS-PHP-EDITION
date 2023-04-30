<?php

namespace App\Repositories;

use App\Models\Credential;

interface CredentialRepositoryInterface
{
    public function create(array $data): Credential;
    public function update(array $data, Credential $credential): Credential;
    public function delete(Credential $credential): bool;
    public function getAllByUser(int $userId): array;
    public function getByIdAndUser(int $id, int $userId): ?Credential;
}
