<?php

namespace App\Services;

use App\Models\Credentials;

class CredentialsService
{
    public function getAllCredentials()
    {
        // Obter todas as credenciais do usuário autenticado
        return Credentials::where('user_id', auth()->user()->id)->get();
    }

    public function createCredential(array $data)
    {
        // Criar uma nova credencial para o usuário autenticado
        $credential = new Credentials($data);
        $credential->user_id = auth()->user()->id;
        $credential->save();

        return $credential;
    }

    public function getCredentialById($id)
    {
        // Obter uma credencial específica pelo ID do usuário autenticado
        return Credentials::where('user_id', auth()->user()->id)
            ->findOrFail($id);
    }

    public function updateCredential($id, array $data)
    {
        // Atualizar uma credencial específica pelo ID do usuário autenticado
        $credential = Credentials::where('user_id', auth()->user()->id)
            ->findOrFail($id);

        $credential->update($data);

        return $credential;
    }

    public function deleteCredential($id)
    {
        // Excluir uma credencial específica pelo ID do usuário autenticado
        return Credentials::where('user_id', auth()->user()->id)
            ->findOrFail($id)
            ->delete();
    }
}
