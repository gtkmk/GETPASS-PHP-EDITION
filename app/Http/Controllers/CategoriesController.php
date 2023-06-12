<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function index()
    {
        // Obter todas as categorias do usuário autenticado
        $categories = $this->categoriesService->getAllCategories();

        // Retornar uma resposta, exibindo as categorias
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Criar uma nova categoria
        $category = $this->categoriesService->createCategory($data);

        // Retornar uma resposta, exibindo a nova categoria criada
        return response()->json($category, 201);
    }

    public function show($id)
    {
        // Obter uma categoria específica pelo ID
        $category = $this->categoriesService->getCategoryById($id);

        // Retornar uma resposta, exibindo a categoria encontrada
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'name' => 'string'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Atualizar uma categoria existente
        $category = $this->categoriesService->updateCategory($id, $data);

        // Retornar uma resposta, exibindo a categoria atualizada
        return response()->json($category);
    }

    public function destroy($id)
    {
        // Excluir uma categoria existente
        $this->categoriesService->deleteCategory($id);

        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'Categoria deletada com sucesso']);
    }
}
