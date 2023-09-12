<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Http\Controllers\Controller;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
