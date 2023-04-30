<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserRepository()
    {
        return $this->userRepository;
    }

    public function getById($id)
    {
        $user = $this->getUserRepository()->getById($id);
        return response()->json($user);
    }

    public function getByEmail(Request $request)
    {
        $email = $request->input('email');
        $user = $this->getUserRepository()->getByEmail($email);
        return response()->json($user);
    }

    public function create(Request $request)
    {
        $userData = $request->all();
        $user = $this->getUserRepository()->create($userData);
        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $userData = $request->all();
        $user = $this->getUserRepository()->update($id, $userData);
        return response()->json($user);
    }

    public function delete($id)
    {
        $result = $this->getUserRepository()->delete($id);
        return response()->json(['success' => $result]);
    }
}
