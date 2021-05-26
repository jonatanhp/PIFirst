<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargaAcadController;
use App\Http\Controllers\ContratoMatriculaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoDocenteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\SeccionController;
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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('provincias', ProvinciaController::class);
    Route::resource('distritos', DistritoController::class);
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('nivels', NivelController::class);
    Route::resource('grados', GradoController::class);
    Route::resource('seccions', SeccionController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('representantes', RepresentanteController::class);
    Route::resource('periodos', PeriodoController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('pagos', PagoController::class);
    Route::resource('carga_acads', CargaAcadController::class);
    Route::resource('contrato_matriculas', ContratoMatriculaController::class);
    Route::resource('curso_docentes', CursoDocenteController::class);
    Route::resource('cursos', CursoController::class);
});


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
