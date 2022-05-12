<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Rol;
use App\Models\usuario_rol;

class Usuario extends Model
{
    protected $table = "users";
    protected $fillable = ['nombre', 'apellido', 'username',
                            'email', 'password', 'estado', 'image'];
    public    $timestamp = true;

    public function roles()
    {
    	return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public static function usuarioByRole()
    {
        $usuario = new Usuario();
        return $usuario->whereHas('roles', function ($query) {
            $query->where('rol_id', 5);
        })->get()
          ->toArray();
    }
}
