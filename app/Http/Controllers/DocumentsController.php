<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Generate a PDF for the atestado.
     */
    public function atestadoCreate($id)
    {
        // // Recupere o usuário com os metadados
         $schedule = Schedules::find($id);
         $client = User::find($schedule->user_id);

        // Dados a serem passados para a view do PDF
        $data = [
            'schedule'=> $schedule,
            'client' => $client,
        ];
        return view('dashboard.documents.atestado.index', compact('data'));
        // Gere o PDF a partir da view 'dashboard.documents.atestado.index' e passe os dados
        // $pdf = PDF::loadView('dashboard.documents.atestado.index', $data);

        // // Defina o nome do arquivo de saída (opcional)
        // $nomeArquivo = 'atestado-' . $client->name. '-' . Hash::make($id) . '.pdf';

        // // Faça o download do PDF ou exiba-o no navegador
        // return $pdf->download($nomeArquivo);

    }
    public function reciboCreate($id)
    {
        // // Recupere o usuário com os metadados
         $schedule = Schedules::find($id);
         $client = User::find($schedule->user_id);

        // Dados a serem passados para a view do PDF
        $data = [
            'schedule'=> $schedule,
            'client' => $client,
        ];
        return view('dashboard.documents.recibo.index', compact('data'));
        // Gere o PDF a partir da view 'dashboard.documents.atestado.index' e passe os dados
        // $pdf = PDF::loadView('dashboard.documents.atestado.index', $data);

        // // Defina o nome do arquivo de saída (opcional)
        // $nomeArquivo = 'atestado-' . $client->name. '-' . Hash::make($id) . '.pdf';

        // // Faça o download do PDF ou exiba-o no navegador
        // return $pdf->download($nomeArquivo);

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
