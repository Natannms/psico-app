<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMetaData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexClient($id)
    {
        $chedulesByClient = Schedules::where('user_id', $id)->paginate(10);

        $data = [
            'agendamentos' => $chedulesByClient
        ];

        return view('dashboard.agendamentos.cliente.index', compact('data'));
    }

    public function indexes($id, $data_inicial = null, $data_final = null)
    {
        $query = Schedules::where('user_id', $id);

        // Aplicar filtro por data, se os parâmetros estiverem definidos
        if ($data_inicial && $data_final) {
            $query->whereBetween('created_at', [$data_inicial, $data_final]);
        }

        $schedules = $query->paginate(4);

        $data = [
            'schedules' => $schedules
        ];

        return view('dashboard', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function scheduleClientCreate(Request $request)
    {
        $forAClient =  $request->query('client_id');
        $data = [
            'withSchedule' => true
        ];

        if($forAClient && $forAClient !== 0){
            $client= User::find($request->query('client_id'));
            if($client){
                $data['client_id'] = $client->id;
            }
        }

        return view('dashboard.client.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->client_id){
            $request->validate([
                'date'=> 'required',
                'occurrency' => 'required'
            ]);


            $schedule = Schedules::create([
                'user_id' => $request->client_id,
                'date' => $request->date,
                'isPaied' => 'pending',
                'occurrency' => $request->occurrency
            ]);

            if(!$request){
                return back()->with('error', 'Não foi possivel realizar ageendamento');
            }

            return back()->with('success', 'Agendamento cadastrado com sucesso');
        }else{
            $request->validate([
                'date'=> 'required',
                'occurrency' => 'required',
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'date' => 'required',
                'occurrency' => 'required',
            ]);

            if($request->password !== $request->password_confirmation){
                return back()->with('error', 'As senhas não são idênticas');
            }

            $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'type'=> 'client',
                'status' => 'enable'
            ]);

            if(!$user){
                return back()->with('error', 'Não foi possivel criar um novo cliente');
            }

            $schedule = Schedules::create([
                'user_id' => $user->id,
                'date' => $request->date,
                'isPaied' => 'pending',
                'occurrency' => $request->occurrency
            ]);

            if(!$schedule){
                $user->delete();
                return back()->with('error', 'Não foi possivel criar um novo cliente');
            }

            $userMetaData = UserMetaData::create([
                'user_id'=>$user->id,
                "cpf"=> $request->cpf,
                "phone"=> $request->phone,
                "cep"=> $request->cep,
                "logradouro"=> $request->logradouro,
                "complemento"=> $request->complemento,
                "bairro"=> $request->bairro,
                "localidade"=> $request->localidade,
                "uf"=> $request->uf,
                "ddd"=> $request->ddd,
            ]);

            if(!$userMetaData){
                return back()->with('error', 'Agendamento e usuários criados, porem seus dados pessoais não foram registrados. Mas não se preocupe ele será notificado para que regularize seu cadastro');
            }

            return back()->with('success', 'Cadastrado com sucesso');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedules $schedules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedules $schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedules $schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedules $schedules)
    {
        //
    }
}
