<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;

class Inicio extends BaseController
{
    private $encrypter;
    
    public function __construct()
    {
        //parent::__construct();

        $this->$encrypter = \Config\Services::encrypter();
    }

    public function index()
    {
        $a = new UsuarioModel($db);
        $users = $a->findAll();
        //print_r($users);
        

        $data['listaUsuarios'] = $users;
        return view('welcome_message', $data);
    }

    public function nuevoInicio()
    {
        //creamos el objeto que maneja la base de datos
        $a = new UsuarioModel($db);
        
        $script = array
        (
            '<script>
                $(document).ready( function () {
                    $("#TablaTipoUsuarios").DataTable();
                    $("[data-bs-toggle=\'tooltip\']").tooltip();  
                } );
            </script>'
        );
        $footer['script'] = $script;

        // funcion dentro del
        $users = $a->tipoUsuarios();
        //print_r($users);

        $data['listaUsuarios'] = $users;

        $navdata['session'] = $this->session;

        echo view('layout/header');
        echo view('layout/navbar', $navdata);
        echo view('welcome_message', $data);
        echo view('layout/footer', $footer);

    }
}
