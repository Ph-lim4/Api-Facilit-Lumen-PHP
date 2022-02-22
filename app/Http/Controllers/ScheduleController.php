<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
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
    public function showAllSchedules()
    {
        return response()->json(Schedule::all()); //retorna serviços do banco
    }
//CADASTRAR------------------------------  
    public function createSchedule(Request $request)
    {
        //validacao
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'price' => 'required',
            'hour' => 'required',
            'status' => 'required',
            'shopName' => 'required',
            'contractsServices' => 'required',
            'duration' => 'required',
            'shopId' => 'required',
            'userId' => 'required',
            'serviceId' => 'required'
        ]);

        //Inserindo um schedule
        $schedule = new Schedule;
        $schedule->name = $request->name;
        $schedule->date = $request->date;
        $schedule->hour = $request->hour;
        $schedule->price = $request->price;
        $schedule->status = $request->status;
        $schedule->shopName = $request->shopName;
        $schedule->contractsServices = $request->contractsServices;
        $schedule->duration = $request->duration;
        $schedule->shopId = $request->shopId;
        $schedule->userId = $request->userId;
        $schedule->serviceId = $request->serviceId;



// name (foreign key service)
// date
// hour
// price 
// status
// shopName
// contractsServices (array)
// duration
// bossId (foreign key boss)
// userId (foreign key User)
// serviceId (array)

        //precisa salvar o registro no banco
        $schedule->save();   
        return response()->json($schedule);
    }
//MOSTRAR UM -------------------------
    public function readSchedule($id)
    {
        return response()->json(Schedule::find($id));
    }
//ATUALIZAR ----------------------------
    public function updateSchedule($id, Request $request)
    {
        $schedule = Schedule::find($id);
        
        $schedule->name = $request->name;
        $schedule->date = $request->date;
        $schedule->hour = $request->hour;
        $schedule->price = $request->price;
        $schedule->status = $request->status;
        $schedule->shopName = $request->shopName;
        $schedule->contractsServices = $request->contractsServices;
        $schedule->duration = $request->duration;
        $schedule->shopId = $request->shopId;
        $schedule->userId = $request->userId;
        $schedule->serviceId = $request->serviceId;

        //utilizar função de save novamente
        $schedule->save();
        return response()->json($schedule);
    }
//DELETAR --------------------------
    public function deleteSchedule($id)
    {
        $schedule = Schedule::find($id);

        $schedule->delete();
        return response()->json('Deletado com Sucesso', 200);
    }
    //-----------------------------------
}