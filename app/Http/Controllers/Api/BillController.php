<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillRequest;
use App\Models\Bill;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index(): JsonResponse
    {
        // $bills = Bill::orderBy('id', 'DESC')->get();

        // Recupera as contas do banco de dados, ordenadas pelo id em ordem decrescente, paginadas
        $bills = Bill::orderBy('id', 'DESC')->paginate(40);

        // Retorna as contas recuperadas como uma resposta JSON
        return response()->json([
            'status' => true,
            'bills' => $bills,
        ], 200);
    }

    /**
     * Exibe os detalhes de uma conta específica
     *
     * Este método retorna os detalhes de uma conta específica em formato JSON.
     *
     * @param \App\Models\Bill $bill O objeto da conta a ser exibido
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Bill $bill): JsonResponse
    {
        // Retorna os detalhes da conta em formato JSON
        return response()->json([
            'status' => true,
            'bill' => $bill,
        ], 200);
    }


    public function store(BillRequest $request)
    {
        // Iniciar a transação
        DB::beginTransaction();

        try{
            // Cadastrar o registro no banco de dados
            $bill = Bill::create([
                'name' => $request->name,
                'bill_value' => $request->bill_value,
                'due_date'=> $request->due_date
            ]);

            // Operação é concluida com êxito
            DB::commit();

            // Retornar os dados em formato de objeto e status 201
            return response()->json([
                'status' => true,
                'bill' => $bill,
                'message' => 'Conta cadastrada com sucesso!'
            ], 201);

        } catch (Exception $e) {

            // Operação não é concluida com ẽxito
            DB::rollBack();

            // Retorna os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Conta não cadastrada!'
            ], 400);
        }
    }


    public function update(BillRequest $request, Bill $bill)
    {

        // Iniciar a transação
        DB::beginTransaction();

        try{
            // Editar o registro no banco de dados
            $bill->update([
                'name' => $request->name,
                'bill_value' => $request->bill_value,
                'due_date'=> $request->due_date
            ]);

            // Operação é concluida com êxito
            DB::commit();

            // Retornar os dados da conta editada e uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'bill' => $bill,
                'message' => 'Conta atualizada com sucesso!'
            ], 200);

        } catch (Exception $e) {

            // Operação não é concluida com ẽxito
            DB::rollBack();

            // Retorna os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Conta não editada!'
            ], 400);
        }
    }


    public function destroy(Bill $bill)
    {

        try{

            // Excluir o registro do banco de dados
            $bill->delete();

            // Retornar os dados da conta apagada e uma mensagem de sucesso com o status 200
            return response()->json([
                'status' => true,
                'bill' => $bill,
                'message' => 'Conta apagada com sucesso!'
            ], 200);

        } catch (Exception $e) {

            // Operação não é concluida com ẽxito
            DB::rollBack();

            // Retorna os dados em formato de objeto e status 400
            return response()->json([
                'status' => false,
                'message' => 'Conta não apagada!'
            ], 400);
        }
    }
}
