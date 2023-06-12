<?php

namespace App\Http\Controllers;

use App\Services\CredentialsService;
use Illuminate\Http\Request;

class CredentialsController extends Controller
{
    protected $credentialsService;

    public function __construct(CredentialsService $credentialsService)
    {
        $this->credentialsService = $credentialsService;
    }

    public function index()
    {
        // Obter todas as credenciais do usuário autenticado
        $credentials = $this->credentialsService->getAllCredentials();

        // Retornar uma resposta, exibindo as credenciais
        return response()->json($credentials);
    }

    public function store(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Criar uma nova credencial
        $credential = $this->credentialsService->createCredential($data);

        // Retornar uma resposta, exibindo a nova credencial criada
        return response()->json($credential, 201);
    }

    public function show($id)
    {
        // Obter uma credencial específica pelo ID
        $credential = $this->credentialsService->getCredentialById($id);

        // Retornar uma resposta, exibindo a credencial encontrada
        return response()->json($credential);
    }

    public function update(Request $request, $id)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'username' => 'string',
            'password' => 'string',
            'category_id' => 'integer'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Atualizar uma credencial existente
        $credential = $this->credentialsService->updateCredential($id, $data);

        // Retornar uma resposta, exibindo a credencial atualizada
        return response()->json($credential);
    }

    public function destroy($id)
    {
        // Excluir uma credencial existente
        $this->credentialsService->deleteCredential($id);

        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'Credencial deletada com sucesso']);
    }
}
