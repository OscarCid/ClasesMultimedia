<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoUser extends Model
{
    protected $table      = 'TipoUsuarios';
    protected $primaryKey = 'id_tipoUsuarios';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['nombre', 'descripcion','estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}