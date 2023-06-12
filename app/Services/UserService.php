<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserService
{
    public function getAllUsers()
    {
        // Obter todos os usuários
        return User::all();
    }

    public function createUser(array $data)
    {
        // Criar um novo usuário
        return User::create($data);
    }

    public function getUserById($id)
    {
        // Obter um usuário específico pelo ID
        return User::findOrFail($id);
    }

    public function updateUser($id, array $data)
    {
        // Atualizar um usuário específico pelo ID
        $user = User::findOrFail($id);

        $user->update($data);

        return $user;
    }

    public function deleteUser($id)
    {
        // Excluir um usuário específico pelo ID
        return User::findOrFail($id)->delete();
    }

    // public function authenticateUser($email, $password)
    // {
    //     // Verificar se as credenciais são válidas
    //     if (auth()->attempt(['email' => $email, 'password' => $password])) {
    //         // Autenticação bem-sucedida, gerar o token de acesso
    //         $accessToken = auth()->user()->createToken('authToken')->accessToken;
    
    //         return $accessToken;
    //     }
    
    //     // Autenticação falhou, retornar null
    //     return null;
    // }
}
