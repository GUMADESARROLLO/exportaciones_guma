<?php

use App\Models\Notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('notificaciones', function() {
    $data = array();
    $i = 0;
    $notificaciones = Notificaciones::select('notificaciones.*', 'users.nombre', 'users.apellido')
            ->join('users', 'users.id', '=', 'notificaciones.usuario_id')
            ->Where('notificaciones.leido', '0')
            ->get();
    
    foreach($notificaciones as $dataN){
        $data[$i]['id']            = $dataN['id'];
        $data[$i]['user_id']       = $dataN['usuario_id'];
        $data[$i]['title']         = $dataN['title'];
        $data[$i]['message']       = $dataN['message'];
        $data[$i]['leido']         = $dataN['leido'];
        $data[$i]['created_at']    = carbon::parse($dataN['created_at'])->diffForHumans();
        $data[$i]['updated_at']    = $dataN['updated_at'];
        $data[$i]['nombre']        = $dataN['nombre'];
        $data[$i]['apellido']      = $dataN['apellido'];
        $i++;
    }


    return $data;
});

Route::post('updateState', function() {

    $notificaciones = Notificaciones::where('leido',0)
    ->update([
        'leido' => 1,
    ]);

   
    return $notificaciones;
});

