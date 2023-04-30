<?php

namespace App\Repositories;

use App\Models\Historic;

class HistoricRepository implements HistoricRepositoryInterface
{
    public function create(array $data): Historic
    {
        return Historic::create($data);
    }

    public function update(array $data, Historic $historic): Historic
    {
        $historic->update($data);
        return $historic;
    }

    public function delete(Historic $historic): bool
    {
        return $historic->delete();
    }

    public function getAllByUser(int $userId): array
    {
        return Historic::where('user_id', $userId)->get()->toArray();
    }

    public function getByIdAndUser(int $id, int $userId): ?Historic
    {
        return Historic::where('id', $id)->where('user_id', $userId)->first();
    }
}