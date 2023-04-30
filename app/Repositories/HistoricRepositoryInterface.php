<?php

namespace App\Repositories;

use App\Models\Historic;

interface HistoricRepositoryInterface
{
    public function create(array $data): Historic;
    public function update(array $data, Historic $historic): Historic;
    public function delete(Historic $historic): bool;
    public function getAllByUser(int $userId): array;
    public function getByIdAndUser(int $id, int $userId): ?Historic;
}
