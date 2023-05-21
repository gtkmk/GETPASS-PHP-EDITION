<?php

namespace App\Http\Controllers;

use App\Services\HistoricService;
use Illuminate\Http\Request;

class HistoricController extends Controller
{
    protected $historicService;

    public function __construct(HistoricService $historicService)
    {
        $this->historicService = $historicService;
    }

    public function index()
    {
        // Obter todo o histórico de senhas do usuário autenticado
        $historic = $this->historicService->getAllHistoric();

        // Retornar uma resposta, exibindo o histórico
        return response()->json($historic);
    }

    public function store(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'old_username' => 'required|string',
            'old_password' => 'required|string',
            'change_date' => 'required|date',
            'credentials_id' => 'required|exists:crendentials,id'
        ]);

        // Criar um novo registro de histórico
        $historic = $this->historicService->createHistoric($request->all());

        // Retornar uma resposta, exibindo o novo registro de histórico criado
        return response()->json($historic, 201);
    }

    public function show($id)
    {
        // Obter um registro de histórico específico pelo ID
        $historic = $this->historicService->getHistoricById($id);

        // Retornar uma resposta, exibindo o registro de histórico encontrado
        return response()->json($historic);
    }

    public function update(Request $request, $id)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'old_username' => 'string',
            'old_password' => 'string',
            'change_date' => 'date',
            'credentials_id' => 'exists:crendentials,id'
        ]);

        // Atualizar um registro de histórico existente
        $historic = $this->historicService->updateHistoric($id, $request->all());

        // Retornar uma resposta, exibindo o registro de histórico atualizado
        return response()->json($historic);
    }

    public function destroy($id)
    {
        // Excluir um registro de histórico existente
        $this->historicService->deleteHistoric($id);

        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'Historic deleted successfully']);
    }
}
