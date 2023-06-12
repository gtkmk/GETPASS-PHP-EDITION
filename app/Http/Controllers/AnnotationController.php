<?php

namespace App\Http\Controllers;

use App\Services\AnnotationService;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    protected $annotationService;

    public function __construct(AnnotationService $annotationService)
    {
        $this->annotationService = $annotationService;
    }

    public function index()
    {
        // Obter todas as anotações do usuário autenticado
        $annotations = $this->annotationService->getAllAnnotations();

        // Retornar uma resposta, exibindo as anotações
        return response()->json($annotations);
    }

    public function store(Request $request)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        // Complementar o array $data com o valor "user_id"
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Criar uma nova anotação
        $annotation = $this->annotationService->createAnnotation($data);

        // Retornar uma resposta, exibindo a nova anotação criada
        return response()->json($annotation, 201);
    }

    public function show($id)
    {
        // Obter uma anotação específica pelo ID
        $annotation = $this->annotationService->getAnnotationById($id);

        // Retornar uma resposta, exibindo a anotação encontrada
        return response()->json($annotation);
    }

    public function update(Request $request, $id)
    {
        // Validar os dados de entrada
        $this->validate($request, [
            'title' => 'string',
            'content' => 'string'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        // Atualizar uma anotação existente
        $annotation = $this->annotationService->updateAnnotation($id, $data);

        // Retornar uma resposta, exibindo a anotação atualizada
        return response()->json($annotation);
    }

    public function destroy($id)
    {
        // Excluir uma anotação existente
        $this->annotationService->deleteAnnotation($id);

        // Retornar uma resposta de sucesso
        return response()->json(['message' => 'Anotação deletada com sucesso']);
    }
}
