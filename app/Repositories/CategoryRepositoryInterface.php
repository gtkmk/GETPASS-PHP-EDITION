<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function create(array $data): Category;
    public function update(array $data, Category $category): Category;
    public function delete(Category $Category): bool;
    public function getAllByUser(int $categoryId): array;
    public function getByIdAndUser(int $id, int $categoryId): ?Category;
}
