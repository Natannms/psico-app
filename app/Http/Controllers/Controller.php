<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function readPdf($filename) {
        $path = storage_path("app/public/system/documents/$filename");

        if (file_exists($path)) {
            return Response::file($path);
        } else {
            abort(404); // Retorne um erro 404 se o arquivo não for encontrado
        }
    }
}
