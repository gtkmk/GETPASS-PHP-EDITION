<?php

namespace App\Services;

use App\Models\Historic;

class HistoricService
{
    public function getAllHistoric()
    {
        // Obter todo o histórico de senhas do usuário autenticado
        return Historic::where('user_id', auth()->user()->id)->get();
    }

    public function createHistoric(array $data)
    {
        // Criar um novo registro de histórico
        $historic = new Historic($data);
        $historic->user_id = auth()->user()->id;
        $historic->save();

        return $historic;
    }

    public function getHistoricById($id)
    {
        // Obter um registro de histórico específico pelo ID do usuário autenticado
        return Historic::where('user_id', auth()->user()->id)
        ->findOrFail($id);
    }

    public function updateHistoric($id, array $data)
    {
        $userId = auth()->user()->id;
        // Atualizar um registro de histórico específico pelo ID do usuário autenticado
        $historic = Historic::where('user_id', $userId)
                                ->where('id', $id)
                                ->firstOrFail();

        $historic->update($data);

        return $historic;
    }

    public function deleteHistoric($id)
    {
        // Excluir um registro de histórico específico pelo ID do usuário autenticado
        return Historic::where('user_id', auth()->user()->id)
        ->findOrFail($id)
        ->delete();
    }
}
