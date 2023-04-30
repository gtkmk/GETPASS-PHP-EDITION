<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(array $data, Category $category): Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    public function getAllByUser(int $userId): array
    {
        return Category::where('user_id', $userId)->get()->toArray();
    }

    public function getByIdAndUser(int $id, int $userId): ?Category
    {
        return Category::where('id', $id)->where('user_id', $userId)->first();
    }
}