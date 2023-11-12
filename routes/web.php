<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sumadorController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\CuentahabienteController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\CarritoController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::get('/about/{numero?}', function($numero=0){
    return "Fabian Gonzalez Torres ".$numero;

});


Route::get('/sumador/{num_1}/{num_2}',function($num_1, $num_2){
    $suma= $num_1+$num_2;
    $respuesta = "Las suma es:".($suma)."<br>";
    for($i=0;$i<$suma;$i++)
    {
        $respuesta=$respuesta."Fabian Gonzalez <br>";
    }
    return $respuesta;
});

Route::get('/sumador2/{num_1}/{num_2}',[sumadorController::class,'metodo_sumar'])->middleware('auth');



Route::get('/bienvenida', function(){
    return view('bienvenida');
});

Route::get('/especial/no_entrar/mi_about_muy_largo',function(){
    return view('about');
})->name('creditos');

Route::resource('equipos', EquiposController::class);
Route::post('equipos/search',[EquiposController::class,'search'])->name("equipo_search");



Route::resource('cuentahabientes', CuentahabienteController::class);
Route::post('cuentahabientes/search',[CuentahabienteController::class,'search'])->name("cuentahabientes_search");
Route::get('cuentahabientes/search',[CuentahabienteController::class,'search'])->name("cuentahabientes_search_get");


Route::resource('tarjetas', TarjetaController::class);

Route::get('/equipo_registro',function () {
    
});

Route::get('iniciar_carrito',[CarritoController::class, 'iniciar']);
Route::get('agregar_carrito',[CarritoController::class, 'agregar']);
Route::get('imprimir_carrito',[CarritoController::class, 'imprimirCarrito']);
Route::get('eliminar_carrito',[CarritoController::class, 'eliminarCarrito']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
