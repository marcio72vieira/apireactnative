<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        // Recupera os usuários do banco de dados, ordenadas pelo id em ordem decrescente, paginadas
        $users =  User::orderBy('id', 'DESC')->paginate(10);

        // Retorna os usuários recuperados como uma resposta JSON
        return response()->json([
            'status' => true,
            'users' => $users
        ]);
    }

    /**
     * Exibe os detalhes de um usuário específico
     *
     * Este método retorna os detalhes de um usuário específico em formato JSON.
     *
     * @param \App\Models\User $user O objeto do usuário a ser exibido
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(User $user): JsonResponse
    {
        // Retorna os detalhes de um usuário em formato JSON
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

}


