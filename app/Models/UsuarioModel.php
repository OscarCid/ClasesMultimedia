<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['rut', 'id_tipoUsuario', 'fechaNac', 'estadousuario', 'nombres', 'aPaterno', 'aMaterno', 'email', 'password'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'rut'     => 'required|is_unique[usuarios.rut]|numeric|min_length[7]|max_length[8]',
        'id_tipoUsuario'     => 'required|numeric',
        'nombres'     => 'required|string',
        'aPaterno'     => 'required|string',
        'aMaterno'     => 'required|string',
        'email'     => 'required|valid_email|is_unique[usuarios.email]',
        'password'     => 'required|min_length[10]',
    ];

    protected $validationMessages = [
        'rut' => [
            'is_unique' => 'Lo sentimos. Este rut ya se encuentra registrado, favor intente recuperar su correo o contrasenia.',
            'min_length' => 'El campo Rut no cumple con los digitos minimos necesarios, favor ingrese un rut valido.',
            'max_length' => 'El campo Rut supera el valor permitido, favor ingrese un rut valido.',
            'required' => 'El campo Rut es necesario',
            'numeric' => 'El campo Rut solo acepta numeros',
        ],
        'id_tipoUsuario' => [
            'required' => 'El campo tipo de usuario es necesario',
            'numeric' => 'El campo tipo de usuario solo acepta opciones validas',
        ],
        'nombres' => [
            'required' => 'El campo Nombres es necesario',
            'string' => 'El campo Nombres solo acepta caracteres',
        ],
        'aPaterno' => [
            'required' => 'El campo Apellido Paterno es necesario',
            'string' => 'El campo Apellido Paterno solo acepta caracteres',
        ],
        'aMaterno' => [
            'required' => 'El campo Apellido Materno es necesario',
            'string' => 'El campo Apellido Materno solo acepta caracteres',
        ],
        'email' => [
            'required' => 'El campo Correo Electronico es necesario',
            'valid_email' => 'El campo Correo Electronico solo acepta emails Validos',
            'is_unique' => 'Lo sentimos. Este Correo Electronico ya se encuentra registrado, favor intente recuperar su correo o contrasenia.',
        ],
        'password' => [
            'required' => 'El campo contrasenia es necesario',
            'min_length' => 'El campo contrasenia requiere de 10 caracteres minimo',
        ],
    ];

    protected $skipValidation = false;

    public function tipoUsuarios()
    {
        $users = $this->select('*')
                ->join('tipousuarios', 'tipousuarios.id_tipoUsuarios = usuarios.id_tipoUsuario')
                ->findAll();

        return $users;
    }
}