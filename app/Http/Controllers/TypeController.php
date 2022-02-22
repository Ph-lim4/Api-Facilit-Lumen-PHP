<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Type;
use App\Models\Termos;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TypeController extends Controller
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
public function showAllTypes()
{
    return response()->json(Type::all());//retorna usuarios do banco
}
//CADASTRAR------------------------------  
public function createType(Request $request)
{
    //validacao
    $this->validate($request, [
        'name' => 'required',
        'image' => 'required'
    ]);
    //Inserindo um type
    $type = new Type;
    $type->name = $request->name;
    $type->image = $request->image;

    //precisa salvar o registro no banco
    $type->save();   
    return response()->json($type);
}
//MOSTRAR UM -------------------------
public function readType($id)
{
    return response()->json(Type::find($id));
}
//ATUALIZAR ----------------------------
public function updateType($id, Request $request)
{
    $type = Type::find($id);

    $type->name = $request->name;
    $type->image = $request->image;

    //utilizar função de save novamente
    $type->save();
    return response()->json($type);
}
//DELETAR --------------------------
public function deleteType($id)
{
    $type = Type::find($id);

    $type->delete();
    return response()->json('Deletado com Sucesso', 200);
}
    //-----------------------------------
}