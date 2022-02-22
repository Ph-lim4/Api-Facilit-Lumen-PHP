<?php

namespace App\Http\Controllers;

use App\Models\TimeTwo;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TimeTwoController extends Controller
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
    public function showAllTimeTwos()
    {
        return response()->json(TimeTwo::all()); //retorna serviços do banco
    }
//CADASTRAR------------------------------  
    public function createTimeTwo(Request $request)
    {
        //validacao
        $this->validate($request, [
            'shopId' => 'required',
            'workerId' => 'required',
            'date' => 'required',

        ]);
        //Inserindo um time
        $time = new TimeTwo;
        $time->shopId = $request->shopId;
        $time->workerId = $request->workerId;
        $time->date = $request->date;
        /*
        //-------------------------------
        $time->t00h00 = $request->t00h00;
        $time->t00h10 = $request->t00h10;
        $time->t00h20 = $request->t00h20;
        $time->t00h30 = $request->t00h30;
        $time->t00h40 = $request->t00h40;
        $time->t00h50 = $request->t00h50;
        //-------------------------------
        $time->t01h00 = $request->t01h00;
        $time->t01h10 = $request->t01h10;
        $time->t01h20 = $request->t01h20;
        $time->t01h30 = $request->t01h30;
        $time->t01h40 = $request->t01h40;
        $time->t01h50 = $request->t01h50;
        //-------------------------------
        $time->t02h00 = $request->t02h00;
        $time->t02h10 = $request->t02h10;
        $time->t02h20 = $request->t02h20;
        $time->t02h30 = $request->t02h30;
        $time->t02h40 = $request->t02h40;
        $time->t02h50 = $request->t02h50;
        //-------------------------------
        $time->t03h00 = $request->t03h00;
        $time->t03h10 = $request->t03h10;
        $time->t03h20 = $request->t03h20;
        $time->t03h30 = $request->t03h30;
        $time->t03h40 = $request->t03h40;
        $time->t03h50 = $request->t03h50;
        //-------------------------------
        $time->t04h00 = $request->t04h00;
        $time->t04h10 = $request->t04h10;
        $time->t04h20 = $request->t04h20;
        $time->t04h30 = $request->t04h30;
        $time->t04h40 = $request->t04h40;
        $time->t04h50 = $request->t04h50;
        //-------------------------------
        $time->t05h00 = $request->t05h00;
        $time->t05h10 = $request->t05h10;
        $time->t05h20 = $request->t05h20;
        $time->t05h30 = $request->t05h30;
        $time->t05h40 = $request->t05h40;
        $time->t05h50 = $request->t05h50;
        //-------------------------------
        $time->t06h00 = $request->t07h00;
        $time->t06h10 = $request->t07h10;
        $time->t06h20 = $request->t07h20;
        $time->t06h30 = $request->t07h30;
        $time->t06h40 = $request->t07h40;
        $time->t06h50 = $request->t07h50;
        //-------------------------------
        $time->t07h00 = $request->t07h00;
        $time->t07h10 = $request->t07h10;
        $time->t07h20 = $request->t07h20;
        $time->t07h30 = $request->t07h30;
        $time->t07h40 = $request->t07h40;
        $time->t07h50 = $request->t07h50;
        //-------------------------------
        */
        $time->t08h00 = $request->t08h00;
        $time->t08h10 = $request->t08h10;
        $time->t08h20 = $request->t08h20;
        $time->t08h30 = $request->t08h30;
        $time->t08h40 = $request->t08h40;
        $time->t08h50 = $request->t08h50;
        //-------------------------------
        $time->t09h00 = $request->t09h00;
        $time->t09h10 = $request->t09h10;
        $time->t09h20 = $request->t09h20;
        $time->t09h30 = $request->t09h30;
        $time->t09h40 = $request->t09h40;
        $time->t09h50 = $request->t09h50;
        //-------------------------------
        $time->t10h00 = $request->t10h00;
        $time->t10h10 = $request->t10h10;
        $time->t10h20 = $request->t10h20;
        $time->t10h30 = $request->t10h30;
        $time->t10h40 = $request->t10h40;
        $time->t10h50 = $request->t10h50;
        //-------------------------------
        $time->t11h00 = $request->t11h00;
        $time->t11h10 = $request->t11h10;
        $time->t11h20 = $request->t11h20;
        $time->t11h30 = $request->t11h30;
        $time->t11h40 = $request->t11h40;
        $time->t11h50 = $request->t11h50;
        //-------------------------------
        $time->t12h00 = $request->t12h00;
        $time->t12h10 = $request->t12h10;
        $time->t12h20 = $request->t12h20;
        $time->t12h30 = $request->t12h30;
        $time->t12h40 = $request->t12h40;
        $time->t12h50 = $request->t12h50;
        //-------------------------------
        $time->t13h00 = $request->t13h00;
        $time->t13h10 = $request->t13h10;
        $time->t13h20 = $request->t13h20;
        $time->t13h30 = $request->t13h30;
        $time->t13h40 = $request->t13h40;
        $time->t13h50 = $request->t13h50;
        //-------------------------------
        $time->t14h00 = $request->t14h00;
        $time->t14h10 = $request->t14h10;
        $time->t14h20 = $request->t14h20;
        $time->t14h30 = $request->t14h30;
        $time->t14h40 = $request->t14h40;
        $time->t14h50 = $request->t14h50;
        //-------------------------------
        $time->t15h00 = $request->t15h00;
        $time->t15h10 = $request->t15h10;
        $time->t15h20 = $request->t15h20;
        $time->t15h30 = $request->t15h30;
        $time->t15h40 = $request->t15h40;
        $time->t15h50 = $request->t15h50;
        //-------------------------------
        $time->t16h00 = $request->t16h00;
        $time->t16h10 = $request->t16h10;
        $time->t16h20 = $request->t16h20;
        $time->t16h30 = $request->t16h30;
        $time->t16h40 = $request->t16h40;
        $time->t16h50 = $request->t16h50;
        //-------------------------------
        $time->t16h00 = $request->t16h00;
        $time->t16h10 = $request->t16h10;
        $time->t16h20 = $request->t16h20;
        $time->t16h30 = $request->t16h30;
        $time->t16h40 = $request->t16h40;
        $time->t16h50 = $request->t16h50;
        /*
        //-------------------------------
        $time->t17h00 = $request->t17h00;
        $time->t17h10 = $request->t17h10;
        $time->t17h20 = $request->t17h20;
        $time->t17h30 = $request->t17h30;
        $time->t17h40 = $request->t17h40;
        $time->t17h50 = $request->t17h50;
        //-------------------------------
        $time->t18h00 = $request->t18h00;
        $time->t18h10 = $request->t18h10;
        $time->t18h20 = $request->t18h20;
        $time->t18h30 = $request->t18h30;
        $time->t18h40 = $request->t18h40;
        $time->t18h50 = $request->t18h50;
        //-------------------------------
        $time->t19h00 = $request->t19h00;
        $time->t19h10 = $request->t19h10;
        $time->t19h20 = $request->t19h20;
        $time->t19h30 = $request->t19h30;
        $time->t19h40 = $request->t19h40;
        $time->t19h50 = $request->t19h50;
        //-------------------------------
        $time->t20h00 = $request->t20h00;
        $time->t20h10 = $request->t20h10;
        $time->t20h20 = $request->t20h20;
        $time->t20h30 = $request->t20h30;
        $time->t20h40 = $request->t20h40;
        $time->t20h50 = $request->t20h50;
        //-------------------------------
        $time->t21h00 = $request->t21h00;
        $time->t21h10 = $request->t21h10;
        $time->t21h20 = $request->t21h20;
        $time->t21h30 = $request->t21h30;
        $time->t21h40 = $request->t21h40;
        $time->t21h50 = $request->t21h50;
        //-------------------------------
        $time->t22h00 = $request->t22h00;
        $time->t22h10 = $request->t22h10;
        $time->t22h20 = $request->t22h20;
        $time->t22h30 = $request->t22h30;
        $time->t22h40 = $request->t22h40;
        $time->t22h50 = $request->t22h50;
        //-------------------------------
        $time->t23h00 = $request->t23h00;
        $time->t23h10 = $request->t23h10;
        $time->t23h20 = $request->t23h20;
        $time->t23h30 = $request->t23h30;
        $time->t23h40 = $request->t23h40;
        $time->t23h50 = $request->t23h50;
        //-------------------------------
        */

        //precisa salvar o registro no banco
        $time->save();   
        return response()->json($time);
    }
//MOSTRAR UM -------------------------
    public function readTimeTwo($id)
    {
        return response()->json(TimeTwo::find($id));
    }
//ATUALIZAR ----------------------------
    public function updateTimeTwo($id, Request $request)
    {
        $time = TimeTwo::find($id);
        
        $time->shopId = $request->shopId;
        $time->workerId = $request->workerId;
        $time->date = $request->date;
        /*
        //-------------------------------
        $time->t00h00 = $request->t00h00;
        $time->t00h10 = $request->t00h10;
        $time->t00h20 = $request->t00h20;
        $time->t00h30 = $request->t00h30;
        $time->t00h40 = $request->t00h40;
        $time->t00h50 = $request->t00h50;
        //-------------------------------
        $time->t01h00 = $request->t01h00;
        $time->t01h10 = $request->t01h10;
        $time->t01h20 = $request->t01h20;
        $time->t01h30 = $request->t01h30;
        $time->t01h40 = $request->t01h40;
        $time->t01h50 = $request->t01h50;
        //-------------------------------
        $time->t02h00 = $request->t02h00;
        $time->t02h10 = $request->t02h10;
        $time->t02h20 = $request->t02h20;
        $time->t02h30 = $request->t02h30;
        $time->t02h40 = $request->t02h40;
        $time->t02h50 = $request->t02h50;
        //-------------------------------
        $time->t03h00 = $request->t03h00;
        $time->t03h10 = $request->t03h10;
        $time->t03h20 = $request->t03h20;
        $time->t03h30 = $request->t03h30;
        $time->t03h40 = $request->t03h40;
        $time->t03h50 = $request->t03h50;
        //-------------------------------
        $time->t04h00 = $request->t04h00;
        $time->t04h10 = $request->t04h10;
        $time->t04h20 = $request->t04h20;
        $time->t04h30 = $request->t04h30;
        $time->t04h40 = $request->t04h40;
        $time->t04h50 = $request->t04h50;
        //-------------------------------
        $time->t05h00 = $request->t05h00;
        $time->t05h10 = $request->t05h10;
        $time->t05h20 = $request->t05h20;
        $time->t05h30 = $request->t05h30;
        $time->t05h40 = $request->t05h40;
        $time->t05h50 = $request->t05h50;
        //-------------------------------
        $time->t06h00 = $request->t07h00;
        $time->t06h10 = $request->t07h10;
        $time->t06h20 = $request->t07h20;
        $time->t06h30 = $request->t07h30;
        $time->t06h40 = $request->t07h40;
        $time->t06h50 = $request->t07h50;
        //-------------------------------
        $time->t07h00 = $request->t07h00;
        $time->t07h10 = $request->t07h10;
        $time->t07h20 = $request->t07h20;
        $time->t07h30 = $request->t07h30;
        $time->t07h40 = $request->t07h40;
        $time->t07h50 = $request->t07h50;
        //-------------------------------
        */
        $time->t08h00 = $request->t08h00;
        $time->t08h10 = $request->t08h10;
        $time->t08h20 = $request->t08h20;
        $time->t08h30 = $request->t08h30;
        $time->t08h40 = $request->t08h40;
        $time->t08h50 = $request->t08h50;
        //-------------------------------
        $time->t09h00 = $request->t09h00;
        $time->t09h10 = $request->t09h10;
        $time->t09h20 = $request->t09h20;
        $time->t09h30 = $request->t09h30;
        $time->t09h40 = $request->t09h40;
        $time->t09h50 = $request->t09h50;
        //-------------------------------
        $time->t10h00 = $request->t10h00;
        $time->t10h10 = $request->t10h10;
        $time->t10h20 = $request->t10h20;
        $time->t10h30 = $request->t10h30;
        $time->t10h40 = $request->t10h40;
        $time->t10h50 = $request->t10h50;
        //-------------------------------
        $time->t11h00 = $request->t11h00;
        $time->t11h10 = $request->t11h10;
        $time->t11h20 = $request->t11h20;
        $time->t11h30 = $request->t11h30;
        $time->t11h40 = $request->t11h40;
        $time->t11h50 = $request->t11h50;
        //-------------------------------
        $time->t12h00 = $request->t12h00;
        $time->t12h10 = $request->t12h10;
        $time->t12h20 = $request->t12h20;
        $time->t12h30 = $request->t12h30;
        $time->t12h40 = $request->t12h40;
        $time->t12h50 = $request->t12h50;
        //-------------------------------
        $time->t13h00 = $request->t13h00;
        $time->t13h10 = $request->t13h10;
        $time->t13h20 = $request->t13h20;
        $time->t13h30 = $request->t13h30;
        $time->t13h40 = $request->t13h40;
        $time->t13h50 = $request->t13h50;
        //-------------------------------
        $time->t14h00 = $request->t14h00;
        $time->t14h10 = $request->t14h10;
        $time->t14h20 = $request->t14h20;
        $time->t14h30 = $request->t14h30;
        $time->t14h40 = $request->t14h40;
        $time->t14h50 = $request->t14h50;
        //-------------------------------
        $time->t15h00 = $request->t15h00;
        $time->t15h10 = $request->t15h10;
        $time->t15h20 = $request->t15h20;
        $time->t15h30 = $request->t15h30;
        $time->t15h40 = $request->t15h40;
        $time->t15h50 = $request->t15h50;
        /*
        //-------------------------------

        $time->t16h00 = $request->t16h00;
        $time->t16h10 = $request->t16h10;
        $time->t16h20 = $request->t16h20;
        $time->t16h30 = $request->t16h30;
        $time->t16h40 = $request->t16h40;
        $time->t16h50 = $request->t16h50;
        //-------------------------------
        $time->t17h00 = $request->t17h00;
        $time->t17h10 = $request->t17h10;
        $time->t17h20 = $request->t17h20;
        $time->t17h30 = $request->t17h30;
        $time->t17h40 = $request->t17h40;
        $time->t17h50 = $request->t17h50;
        //-------------------------------
        $time->t18h00 = $request->t18h00;
        $time->t18h10 = $request->t18h10;
        $time->t18h20 = $request->t18h20;
        $time->t18h30 = $request->t18h30;
        $time->t18h40 = $request->t18h40;
        $time->t18h50 = $request->t18h50;
        //-------------------------------
        $time->t19h00 = $request->t19h00;
        $time->t19h10 = $request->t19h10;
        $time->t19h20 = $request->t19h20;
        $time->t19h30 = $request->t19h30;
        $time->t19h40 = $request->t19h40;
        $time->t19h50 = $request->t19h50;
        //-------------------------------
        $time->t20h00 = $request->t20h00;
        $time->t20h10 = $request->t20h10;
        $time->t20h20 = $request->t20h20;
        $time->t20h30 = $request->t20h30;
        $time->t20h40 = $request->t20h40;
        $time->t20h50 = $request->t20h50;
        //-------------------------------
        $time->t21h00 = $request->t21h00;
        $time->t21h10 = $request->t21h10;
        $time->t21h20 = $request->t21h20;
        $time->t21h30 = $request->t21h30;
        $time->t21h40 = $request->t21h40;
        $time->t21h50 = $request->t21h50;
        //-------------------------------
        $time->t22h00 = $request->t22h00;
        $time->t22h10 = $request->t22h10;
        $time->t22h20 = $request->t22h20;
        $time->t22h30 = $request->t22h30;
        $time->t22h40 = $request->t22h40;
        $time->t22h50 = $request->t22h50;
        //-------------------------------
        $time->t23h00 = $request->t23h00;
        $time->t23h10 = $request->t23h10;
        $time->t23h20 = $request->t23h20;
        $time->t23h30 = $request->t23h30;
        $time->t23h40 = $request->t23h40;
        $time->t23h50 = $request->t23h50;
        //-------------------------------
        */

        //utilizar função de save novamente
        $time->save();
        return response()->json($time);
    }
//DELETAR --------------------------
    public function deleteTimeTwo($id)
    {
        $time = TimeTwo::find($id);

        $time->delete();
        return response()->json('TimeTwo Deletado com Sucesso', 200);
    }
    //-----------------------------------
}