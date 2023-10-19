<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserMetaData;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
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
     * Store a newly created resource in storage.
     */
    public function uploadLogo(Request $request)
    {
        // Verifique se um arquivo foi enviado corretamente
        if ($request->hasFile('logo')) {
            // Valide o arquivo recebido
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Defina as regras de validação adequadas
            ]);

            // Obtenha o ID do usuário autenticado (você pode ajustar isso conforme necessário)
            $userId = auth()->user()->id;

            // Obtenha o arquivo enviado
            $logoFile = $request->file('logo');

            // Gere um nome de arquivo único para a imagem usando o ID do usuário
            $fileName = 'logo_' . $userId . '.' . $logoFile->getClientOriginalExtension();

            // Salve o arquivo na pasta desejada em storage/public/logos
            $path = $logoFile->storeAs('public/logos/'. $userId, $fileName);

            // Verifique se o arquivo foi salvo com sucesso
            if ($path) {
                // Atualize o campo 'logo' na tabela 'user_metadata' com o caminho do arquivo
                $userMetadata = UserMetaData::where('user_id', $userId)->first();
                $userMetadata->update(['logo' => 'logos/'. $userId.'/'.$fileName]);

                return redirect()->back()->with('success', 'Logo enviado com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Erro ao enviar a logo.');
            }
        } else {
            return redirect()->back()->with('error', 'Nenhum arquivo de logo enviado.');
        }
    }
    public function uploadSeal(Request $request)
    {
        // Verifique se um arquivo foi enviado corretamente
        if ($request->hasFile('seal')) {
            // Valide o arquivo recebido
            $request->validate([
                'seal' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Defina as regras de validação adequadas
            ]);

            // Obtenha o ID do usuário autenticado (você pode ajustar isso conforme necessário)
            $userId = auth()->user()->id;

            // Obtenha o arquivo enviado
            $logoFile = $request->file('seal');

            // Gere um nome de arquivo único para a imagem usando o ID do usuário
            $fileName = 'seal_' . $userId . '.' . $logoFile->getClientOriginalExtension();

            // Salve o arquivo na pasta desejada em storage/public/logos
            $path = $logoFile->storeAs('public/seals/'. $userId, $fileName);

            // Verifique se o arquivo foi salvo com sucesso
            if ($path) {
                // Atualize o campo 'logo' na tabela 'user_metadata' com o caminho do arquivo
                $userMetadata = UserMetaData::where('user_id', $userId)->first();
                $userMetadata->update(['seal' => 'seals/'. $userId.'/'.$fileName]);

                return redirect()->back()->with('success', 'Carimbo enviado com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Erro ao enviar a Carimbo.');
            }
        } else {
            return redirect()->back()->with('error', 'Nenhum arquivo de Carimbo enviado.');
        }
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
        return view('dashboard.images.edit');
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
