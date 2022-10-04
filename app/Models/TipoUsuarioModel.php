<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoUsuarioModel extends Model
{
    protected $table      = 'tipousuarios';
    protected $primaryKey = 'id_tipoUsuarios';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'estado'];

    protected $skipValidation     = true;
}