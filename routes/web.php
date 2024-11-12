<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::view('peticion','nombreVista');
//Route::view('/vista', 'vista');

//Route::get('peticion', 'accion)
Route::get('/mensaje.html', function () 

        {
            return 'Hola mundo desde LARAVEL chameeeego';
        }

);

Route::get('/vista', function()
{
    $nombre = 'oski';
    $numero = 46;
    $datos = [
        'curso' => 'Desarrollo web con LARAVEL',
        'codigo' => 71994,
        'inicio' => '04/11/2024',
        'fin' => '16/12/2024'
    ];
    return view('vista', [
        'nombre' => $nombre,
        'numero' => $numero,
        'datos' => $datos
    ]);
});
