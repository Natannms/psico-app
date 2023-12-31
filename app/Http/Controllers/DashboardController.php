<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Consulta para obter os IDs dos clientes relacionados ao usuário autenticado
        $relatedClientIds = DB::table('user_clients')
            ->where('user_id', $userId)
            ->pluck('client_id')
            ->toArray();

        // Consulta para obter os clientes relacionados
        $clients = User::whereIn('id', $relatedClientIds)
            ->where('type', 'client')
            ->paginate(4);
        $documents = Storage::files('public/system/documents');
        $data = [
            'clients' => $clients,
            'documents' => $documents
        ];
        return view('dashboard', compact('data'));
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
