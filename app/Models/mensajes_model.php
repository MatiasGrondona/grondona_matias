<?php
namespace App\Models;
use CodeIgniter\Model;

class Mensajes_model extends Model {
    protected $table = 'mensajes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'leído'];
}