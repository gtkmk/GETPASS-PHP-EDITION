<?php

namespace App\Services;

use App\Models\Category;

class CategoriesService
{
    public function getAllCategories()
    {
        // Obter todas as categorias do usuário autenticado
        return Category::where('user_id', auth()->user()->id)->get();
    }

    public function createCategory(array $data)
    {
        // Criar uma nova categoria para o usuário autenticado
        $category = new Category($data);
        $category->user_id = auth()->user()->id;
        $category->save();

        return $category;
    }

    public function getCategoryById($id)
    {
        // Obter uma categoria específica pelo ID do usuário autenticado
        return Category::where('user_id', auth()->user()->id)
            ->findOrFail($id);
    }

    public function updateCategory($id, array $data)
    {
        // Atualizar uma categoria específica pelo ID do usuário autenticado
        $category = Category::where('user_id', auth()->user()->id)
            ->findOrFail($id);

        $category->update($data);

        return $category;
    }

    public function deleteCategory($id)
    {
        // Excluir uma categoria específica pelo ID do usuário autenticado
        return Category::where('user_id', auth()->user()->id)
            ->findOrFail($id)
            ->delete();
    }
}
