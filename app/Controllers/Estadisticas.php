<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Estadisticas extends BaseController
{
    public function index()
    {

        echo view('layout/header');
        echo view('layout/navbar');
        echo view('Estadisticas/index');
        echo view('layout/footer');
    }

    public function test()
    {

        echo view('layout/header');
        echo view('layout/navbar');
        echo view('Usuario/login');
        echo view('layout/footer');
    }
}