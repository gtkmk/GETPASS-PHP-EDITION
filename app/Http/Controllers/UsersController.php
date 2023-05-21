<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // Obter todos os usuários
        $users = $this->userService->getAllUsers();

        // Retornar uma resposta, exibindo os usuários
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        // Criar um novo usuário
        $user = $this->userService->createUser($request->all());

        // Retornar uma resposta, exibindo o novo usuário criado
        return response()->json($user, 201);
    }

    public function show($id)
    {
        // Obter um usuário específico pelo ID
        $user = $this->userService->getUserById($id);

        // Retornar uma resposta, exibindo o usuário encontrado
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'name' => 'string',
            'email' => 'email|unique:users',
            'password' => 'string'
        ]);

        // Atualizar um usuário existente
        $user = $this->userService->updateUser($id, $request->all());

        // Retornar uma resposta, exibindo o usuário atualizado
        return response()->json($user);
    }

    public function destroy($id)
    {
        // Excluir um usuário existente
        $this->userService->deleteUser($id);

        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'User deleted successfully']);
    }
}
