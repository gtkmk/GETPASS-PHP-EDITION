<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Repositories\CredentialRepositoryInterface;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    private $credentialRepository;

    public function __construct(CredentialRepositoryInterface $credentialRepository)
    {
        $this->credentialRepository = $credentialRepository;
    }

    public function getCredentialRepository()
    {
        return $this->credentialRepository;
    }

    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $credentials = $this->getCredentialRepository()->getAllByUser($userId);
        return response()->json(['credentials' => $credentials]);
    }

    public function show(Request $request, int $id)
    {
        $userId = $request->user()->id;
        $credential = $this->getCredentialRepository()->getByIdAndUser($id, $userId);

        if (!$credential) {
            return response()->json(['error' => 'Credential not found'], 404);
        }

        return response()->json(['credential' => $credential]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['user_id'] = $request->user()->id;
        $credential = $this->credentialRepository->create($data);

        return response()->json(['credential' => $credential], 201);
    }

    public function update(Request $request, int $id)
    {
        $userId = $request->user()->id;
        $credential = $this->getCredentialRepository()->getByIdAndUser($id, $userId);

        if (!$credential) {
            return response()->json(['error' => 'Credential not found'], 404);
        }

        $data = $request->validate([
            'username' => 'sometimes|required',
            'password' => 'sometimes|required',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $credential = $this->getCredentialRepository()->update($data, $credential);

        return response()->json(['credential' => $credential]);
    }

    public function destroy(Request $request, int $id)
    {
        $userId = $request->user()->id;
        $credential = $this->getCredentialRepository()->getByIdAndUser($id, $userId);

        if (!$credential) {
            return response()->json(['message' => 'Credencial não encontrada'], 404);
        }

        $this->getCredentialRepository()->delete($credential);

        return response()->json(['message' => 'Credencial excluída com sucesso'], 200);
    }
}