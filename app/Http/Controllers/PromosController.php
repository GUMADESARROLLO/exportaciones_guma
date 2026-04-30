<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promos;


class PromosController extends Controller
{

    public function Perfil($codigoCliente = null)
    {
        $cliente = Promos::getInfoCliente($codigoCliente);

        if ($cliente === null) {
            abort(404);
        }

        return view('Clientes.Perfil', compact('cliente'));
    }
}