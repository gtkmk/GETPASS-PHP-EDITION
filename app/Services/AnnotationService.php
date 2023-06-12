<?php

namespace App\Services;

use App\Models\Annotations;

class AnnotationService
{
    public function getAllAnnotations()
    {
        $userId = auth()->user()->id;
        // Retornar as anotações encontradas
        return Annotations::where('user_id', $userId)->get();
    }

    public function createAnnotation(array $data)
    {
        // Criar uma nova anotação
        return Annotations::create($data);
    }

    public function getAnnotationById($id)
    {
        $userId = auth()->user()->id;
        // Obter uma anotação específica pelo ID do usuário autenticado
        return Annotations::where('user_id', $userId)
        ->where('id', $id)->get();

    }

    public function updateAnnotation($id, array $data)
    {
        $userId = auth()->user()->id;    
        // Obter a anotação com base no ID do usuário e ID da anotação
        $annotation = Annotations::where('user_id', $userId)
                                ->where('id', $id)
                                ->firstOrFail();
    
        // Atualizar os dados da anotação
        $annotation->update($data);
    
        return $annotation;
    }

    public function deleteAnnotation($id)
    {
        $userId = auth()->user()->id;
        // Excluir uma anotação específica pelo ID do usuário autenticado
        $annotation = Annotations::where('user_id', $userId)
        ->where('id', $id);

        $annotation->delete();
    }
}
