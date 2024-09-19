<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\JsonResponse;


class BillController extends Controller
{
    public function index(): JsonResponse
    {
        // $bills = Bill::orderBy('id', 'DESC')->get();

        // Recupera as contas do banco de dados, ordenadas pelo id em ordem decrescente, paginadas
        $bills = Bill::orderBy('id', 'DESC')->paginate(1);

        // Retorna as contas recuperadas como uma resposta JSON
        return response()->json([
            'status' => true,
            'bills' => $bills,
        ]);
    }
}
