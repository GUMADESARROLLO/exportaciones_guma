<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table = "notificaciones";
    protected $fillable = ['id', 'usuario_id ', 'message', 'leido', 'created_at','updated_at'];
    
}
