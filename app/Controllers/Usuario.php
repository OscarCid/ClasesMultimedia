<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\TipoUsuarioModel;

class Usuario extends BaseController
{
    private $encrypter;
    
    public function __construct()
    {
        //parent::__construct();

        $this->$encrypter = \Config\Services::encrypter();
    }

    public function crearUsuario()
    {
        $tablaTipoUsuarios = new TipoUsuarioModel($db);
        $tablaTipoUsuarios = $tablaTipoUsuarios->findAll();
        $data['listaTipoUsuario'] = $tablaTipoUsuarios;

        helper('form');

        $navdata['session'] = $this->session;

        echo view('layout/header');
        echo view('layout/navbar', $navdata);
        echo view('Usuario/crearUsuario', $data);
        echo view('layout/footer');
    }

    public function insertaNuevoUsuario()
    {
        $tablaUsuarios = new UsuarioModel($db);

        $data=array(
            'rut'  => $this->request->getPost('rut'),
            'id_tipoUsuario' => $this->request->getPost('tipoUsuario'),
            'fechaNac' => $this->request->getPost('fechaNacimiento'),
            'nombres' => $this->request->getPost('nombres'),
            'aPaterno' => $this->request->getPost('aPaterno'),
            'aMaterno' => $this->request->getPost('aMaterno'),
            'email' => $this->request->getPost('email'),
            'aMaterno' => $this->request->getPost('aMaterno'),
            'password' => password_hash("12345", PASSWORD_DEFAULT)
        );

        if($tablaUsuarios->insert($data)===false)
        {
            var_dump($tablaUsuarios->errors());
        }
        else
        {
            $email = \Config\Services::email();
            $email->setTo("oscar.cid@upla.cl");
            $email->setFrom('oscar.cid@upla.cl', 'Holi');
            
            $email->setSubject("Prueba de mensaje");
            $email->setMessage("Espero por fin pueda mandar un correo!");
            if ($email->send()) 
            {
                echo 'Email successfully sent';
            } 
            else 
            {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }

        }
    }

    public function crearUsuarioAjax()
    {

        $tablaTipoUsuarios = new TipoUsuarioModel($db);
        $tablaTipoUsuarios = $tablaTipoUsuarios->findAll();
        $data['listaTipoUsuario'] = $tablaTipoUsuarios;

        helper('form');

        $script = array
        (
            '<script>
                $("form").submit(function (e) {
                    event.preventDefault()
                    event.stopPropagation()
                    var form = $("#newUser")[0];
                    $.post(this.action, $(this).serialize(), function (response) {
                        
                        if ("rut" in response)
                        {
                            $("#rut").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertaRut").text(response.rut);
                        }
                        else
                        {
                            $("#rut").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertaRut").text("");
                        }

                        if ("id_tipoUsuario" in response)
                        {
                            $("#tipoUsuario").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertatipoUsuario").text(response.id_tipoUsuario);
                        }
                        else
                        {
                            $("#tipoUsuario").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertatipoUsuario").text("");
                        }

                        if ("email" in response)
                        {
                            $("#email").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertaEmail").text(response.email);
                        }
                        else
                        {
                            $("#email").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertaEmail").text("");
                        }

                        if ("nombres" in response)
                        {
                            $("#nombres").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertaNombres").text(response.nombres);
                        }
                        else
                        {
                            $("#nombres").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertaNombres").text("");
                        }

                        if ("aPaterno" in response)
                        {
                            $("#aPaterno").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertaaPaterno").text(response.aPaterno);
                        }
                        else
                        {
                            $("#aPaterno").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertaaPaterno").text("");
                        }

                        if ("aMaterno" in response)
                        {
                            $("#aMaterno").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertaaMaterno").text(response.aMaterno);
                        }
                        else
                        {
                            $("#aMaterno").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertaaMaterno").text("");
                        }
                        if ("password" in response)
                        {
                            $("#contrasenia1").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#contrasenia2").removeClass( "is-valid" ).addClass( "is-invalid" );
                            $("#DivAlertacontrasenia1").text(response.password);
                        }
                        else
                        {
                            $("#contrasenia1").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#contrasenia2").removeClass( "is-invalid" ).addClass( "is-valid" );
                            $("#DivAlertacontrasenia1").text("");
                        }

                        if ("Estado" in response)
                        {
                            var myModal = new bootstrap.Modal(document.getElementById("ModalOK"), {
                                backdrop: "static"
                              })
                            myModal.show()
                        }

                        var isValid = form.checkValidity();
                    }, "json")
                    return false; // For testing only to stay on this page
                });
            </script>'
        );
        $footer['script'] = $script;
        $navdata['session'] = $this->session;

        echo view('layout/header');
        echo view('layout/navbar', $navdata);
        echo view('Usuario/crearUsuarioAjax', $data);
        echo view('layout/footer', $footer);
    }

    public function insertaNuevoUsuarioAjax()
    {
        //$this->load->library('email');
        $tablaUsuarios = new UsuarioModel($db);

        $data=array(
            'rut'  => $this->request->getPost('rut'),
            'id_tipoUsuario' => $this->request->getPost('tipoUsuario'),
            'fechaNac' => $this->request->getPost('fechaNacimiento'),
            'nombres' => $this->request->getPost('nombres'),
            'aPaterno' => $this->request->getPost('aPaterno'),
            'aMaterno' => $this->request->getPost('aMaterno'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('contrasenia1'), PASSWORD_DEFAULT)
        );

        if($this->request->getPost('contrasenia1') != $this->request->getPost('contrasenia2'))
        {
            $post_data = json_encode(array('password' => 'Las contrasenias ingresadas no coinciden'));

            echo $post_data;
        }
        elseif($tablaUsuarios->insert($data)===false)
        {
            //var_dump($tablaUsuarios->errors());
            echo json_encode($tablaUsuarios->errors());
        }
        else
        {
            $post_data = json_encode(array('Estado' => 'ok'));

            echo $post_data;
        }
    }

    public function login()
    {
        $navdata['session'] = $this->session;

        echo view('layout/header');
        echo view('layout/navbar', $navdata);
        echo view('Usuario/login');
        echo view('layout/footer');
    }

    public function loginAuth()
    {
        $this->session = session();
        $userModel = new UsuarioModel($db);

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        //$password = $this->$encrypter->encrypt($password);
        
        echo "email: ". $email;

        $data = $userModel->where('email', $email)->first();
        
        if($data)
        {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'tipoUsuario' => $data['id_tipoUsuario'],
                    'nombres' => $data['nombres'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($ses_data);
                echo "cayo en Password is CORRECT!";
                return redirect()->to('/Inicio/nuevoInicio');
            
            }else{
                $this->session->setFlashdata('msg', 'Contrasenia Incorrecta.');
                return redirect()->to('/Usuario/login');
            }
        }
        else
        {
            $this->session->setFlashdata('msg', 'El correo ingresado <b> no existe </b> en nuestras bases de datos.');
            return redirect()->to('/Usuario/login');
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/Inicio/nuevoInicio');
    }
}