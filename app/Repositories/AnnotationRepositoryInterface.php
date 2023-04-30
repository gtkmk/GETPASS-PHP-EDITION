<?php

namespace App\Repositories;

use App\Models\Annotations;

interface AnnotationRepositoryInterface
{
    public function create(array $data): Annotations;
    public function update(array $data, Annotations $annotations): Annotations;
    public function delete(Annotations $Annotations): bool;
    public function getAllByUser(int $annotationsId): array;
    public function getByIdAndUser(int $id, int $annotationsId): ?Annotations;
}