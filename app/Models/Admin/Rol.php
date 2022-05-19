<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\usuario;

class Rol extends Model
{
    protected $table = 'rol';
    protected $fillable = ['descripcion'];


    public function usuarioByRole() {
        return $this->belongsToMany(usuario::class, 'usuario_rol');
    }
}
