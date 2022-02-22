<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    /**
     * Instância de um objeto da classe Request
     * 
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Cria uma nova instância do controller.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
     */
    public function __construct(Request $req)
    {
        $this->request = $req;
    }

    /**
     * Retorna dados de um usuário em específico.
     * 
     * @param int $id
     * @return mixed
     */

//MOSTRAR TODOS--------------------------
    public function showAllWorkers()
    {
        return response()->json(Worker::all()); //retorna serviços do banco
    }
//CADASTRAR------------------------------  
    public function createWorker(Request $request)
    {
        //validacao
        $this->validate($request, [
            'name' => 'required',
            'shopId' => 'required',
            'openingTimeOne' => 'required',
            'closingTimeOne' => 'required',
            'openingTimeTwo' => 'required',
            'closingTimeTwo' => 'required',
            'photo_profile' => 'required'
        ]);
        //Inserindo um worker
        $worker = new Worker;
        $worker->name = $request->name;
        $worker->shopId = $request->shopId;
        $worker->openingTimeOne = $request->openingTimeOne;
        $worker->closingTimeOne = $request->closingTimeOne;
        $worker->openingTimeTwo = $request->openingTimeTwo;
        $worker->closingTimeTwo = $request->closingTimeTwo;
        $worker->photo_profile = $request->photo_profile;

        //precisa salvar o registro no banco
        $worker->save();   
        return response()->json($worker);
    }
//MOSTRAR UM -------------------------
    public function readWorker($id)
    {
        return response()->json(Worker::find($id));
    }
//ATUALIZAR ----------------------------
    public function updateWorker($id, Request $request)
    {
        $worker = Worker::find($id);
        
        $worker->name = $request->name;
        $worker->shopId = $request->shopId;
        $worker->openingTimeOne = $request->openingTimeOne;
        $worker->closingTimeOne = $request->closingTimeOne;
        $worker->openingTimeTwo = $request->openingTimeTwo;
        $worker->closingTimeTwo = $request->closingTimeTwo;
        $worker->photo_profile = $request->photo_profile;

        //utilizar função de save novamente
        $worker->save();
        return response()->json($worker);
    }
//DELETAR --------------------------
    public function deleteWorker($id)
    {
        $worker = Worker::find($id);

        $worker->delete();
        return response()->json('Worker Deletado com Sucesso', 200);
    }
    //-----------------------------------
}