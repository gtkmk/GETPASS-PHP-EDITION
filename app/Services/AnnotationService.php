<?php

namespace App\Services;

use App\Models\Annotations;

class AnnotationService
{
    public function getAllAnnotations()
    {
        // Obter todas as anotações do usuário autenticado
        return Annotations::whereHas('category', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
    }

    public function createAnnotation(array $data)
    {
        // Criar uma nova anotação
        return Annotations::create($data);
    }

    public function getAnnotationById($id)
    {
        // Obter uma anotação específica pelo ID do usuário autenticado
        return Annotations::whereHas('category', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);
    }

    public function updateAnnotation($id, array $data)
    {
        // Atualizar uma anotação específica pelo ID do usuário autenticado
        $annotation = Annotations::whereHas('category', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);

        $annotation->update($data);

        return $annotation;
    }

    public function deleteAnnotation($id)
    {
        // Excluir uma anotação específica pelo ID do usuário autenticado
        return Annotations::whereHas('category', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id)->delete();
    }
}
