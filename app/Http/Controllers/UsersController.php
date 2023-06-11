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

    public function authenticate(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Autenticar o usuário e obter o token de acesso
        $accessToken = $this->userService->authenticateUser($email, $password);
    
        if ($accessToken) {
            // Autenticação bem-sucedida, retornar o token de acesso como resposta
            return response()->json(['access_token' => $accessToken]);
        } else {
            // Autenticação falhou, retornar uma resposta de erro
            return response()->json(['message' => 'Authentication failed'], 401);
        }
    }

}
