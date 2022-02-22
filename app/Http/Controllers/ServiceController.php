<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Service;
use App\Models\Termos;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
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
    public function showAllServices()
    {
        return response()->json(Service::all()); //retorna serviços do banco
    }
//CADASTRAR------------------------------  
    public function createService(Request $request)
    {
        //validacao
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'boss' => 'required',
            'image' => 'required',
            'type' => 'required',
            'time' => 'required'
        ]);
        //Inserindo um service
        $service = new Service;
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->boss = $request->boss;
        $service->image = $request->image;
        $service->type = $request->type;
        $service->time = $request->time;

        //precisa salvar o registro no banco
        $service->save();   
        return response()->json($service);
    }
//MOSTRAR UM -------------------------
    public function readService($id)
    {
        return response()->json(Service::find($id));
    }
//ATUALIZAR ----------------------------
    public function updateService($id, Request $request)
    {
        $service = Service::find($id);
        
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->boss = $request->boss;
        $service->image = $request->image;
        $service->type = $request->type;
        $service->time = $request->time;

        //utilizar função de save novamente
        $service->save();
        return response()->json($service);
    }
//DELETAR --------------------------
    public function deleteService($id)
    {
        $service = Service::find($id);

        $service->delete();
        return response()->json('Deletado com Sucesso', 200);
    }
    //-----------------------------------
}