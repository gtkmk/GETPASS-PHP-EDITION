<?php

namespace App\Services;

use App\Models\Historic;

class HistoricService
{
    public function getAllHistoric()
    {
        // Obter todo o histórico de senhas do usuário autenticado
        return Historic::whereHas('credential', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
    }

    public function createHistoric(array $data)
    {
        // Criar um novo registro de histórico
        return Historic::create($data);
    }

    public function getHistoricById($id)
    {
        // Obter um registro de histórico específico pelo ID do usuário autenticado
        return Historic::whereHas('credential', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);
    }

    public function updateHistoric($id, array $data)
    {
        // Atualizar um registro de histórico específico pelo ID do usuário autenticado
        $historic = Historic::whereHas('credential', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);

        $historic->update($data);

        return $historic;
    }

    public function deleteHistoric($id)
    {
        // Excluir um registro de histórico específico pelo ID do usuário autenticado
        return Historic::whereHas('credential', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id)->delete();
    }
}
