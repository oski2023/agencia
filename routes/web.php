<?php

use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\table;

/* Route::get('/', function () {
    return view('welcome');
}); */

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

Route::view('/nav','navbar');

Route::view('/banner','hero');

Route::get('/proveedores', function()
{
    //Obtenemos el listado de proveedores
    /** @var \Illuminate\Database\DatabaseManager DB */
    $proveedores = DB::select('SELECT * FROM proveedores');
    
    
    //Retornamos la vista
    return view('proveedores', ['proveedores'=> $proveedores ]);
});

Route::view('/', 'plantilla');

Route::get('/regiones', function () 
{
    /* $regiones = DB::select('SELECT * FROM regiones ORDER BY idRegion DESC'); */

    /* QUERY BUILDER */
    $regiones = DB::table('regiones')
                ->orderBy('idRegion', 'asc')
                ->get();
    //Retornamos la vista "regiones"
    return view('regiones', ['regiones'=>$regiones]);  
});

Route::get('/destinos', function () 
{
    //Obtenemos listado de destinos
    $destinos = DB::table('destinos as d')
                ->join('regiones as r', 'd.idRegion', '=', 'r.idRegion')
                ->orderBy('idDestino')
                ->get();
    
    /* dd($destinos); */
    //Retornamos la vista "destinos"
    return view('destinos', ['destinos'=>$destinos]);
});

Route::get('/destino/create', function()
{
    //Obtenemos Listado de Regiones (para alimentar el desplegable de Region)
    /* QUERY BUILDER */
    $regiones = DB::table('regiones' )->get();
    return view('destinoCreate', ['regiones'=>$regiones]);
});

Route::post('/destino/store', function()
{
    //Capturamos los datos enviados por el form
    /* $aeropuerto = $_POST['']  esto se hace en php vanila*/
    //En laravel lo se hacia primero asi
    /* $aeropuerto = request()->post('aeropuerto'); */
    //Luego se actualizo y se hace asi:
    /* $aeropuerto = request()->input('aeropuerto'); */
    //Despues en la version 7 asi:
    /* $aeropuerto = request()->aeropuerto; */
    //Y en esta version asi:
    $aeropuerto = request('aeropuerto');
    $precio = request('precio');
    $idRegion = request('idRegion');

    try {
        //Si hacemos un row sql seria asi:

        /* DB::insert('insert into destinos
                        ( aeropuerto, precio, idRegion)
                         VALUE
                         ( :aeropuerto, :precio, :idRegion)'
                          , ['$aeropuerto', '$precio', '$idRegion' ] ); */
        
        //Ahora si hacemos un QUERY BUILDER seria asi:
        DB::table('destinos')
                ->insert(
                            [
                                'aeropuerto' => $aeropuerto,
                                'precio' => $precio,
                                'idRegion' => $idRegion,
                                'activo' => 1
                            ]
                        );

        return redirect('/destinos')
                  ->with(
                          [
                              'css' => 'green',
                              'mensaje' => 'Destino: '.$aeropuerto.' agregado correctamente'
                          ]
                        );


    } catch( Throwable $th) {

      return redirect('/destinos')
                  ->with(
                          [
                              'css' => 'red',
                              'mensaje' => 'No se pudo agregar el destino: '.$aeropuerto
                          ]
                        );

    } 
    
});

Route::get('/region/create', function()
{
    //Obtenemos Listado de Regiones (para alimentar el desplegable de Region)
    /* QUERY BUILDER */
    /* $regiones = DB::table('regiones' )->get(); */
    return view('regionCreate');
});

Route::post('/region/store', function()
{
//Capturamos los datos enviados por el form
$nombre = request('nombre');

    try {
        //Ahora si hacemos un QUERY BUILDER seria asi:
        DB::table('regiones')
                ->insert(
                          [
                            'nombre' => $nombre,
                          ]
                        );

        return redirect('/regiones')
        ->with(
                [
                    'css' => 'green',
                    'mensaje' => 'Region: '.$nombre.' agregado correctamente'
                ]
              );

    } catch ( Throwable $th) {

      return redirect('/regiones')
                  ->with(
                          [
                              'css' => 'red',
                              'mensaje' => 'No se pudo agregar la region: '.$nombre
                          ]
                        );

              }


});