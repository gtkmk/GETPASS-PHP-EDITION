<?php

namespace App\Repositories;

use App\Models\Annotations;

class AnnotationRepository implements AnnotationRepositoryInterface
{
    public function create(array $data): Annotations
    {
        return Annotations::create($data);
    }

    public function update(array $data, Annotations $annotations): Annotations
    {
        $annotations->update($data);
        return $annotations;
    }

    public function delete(Annotations $annotations): bool
    {
        return $annotations->delete();
    }

    public function getAllByUser(int $userId): array
    {
        return Annotations::where('user_id', $userId)->get()->toArray();
    }

    public function getByIdAndUser(int $id, int $userId): ?Category
    {
        return Annotations::where('id', $id)->where('user_id', $userId)->first();
    }
}