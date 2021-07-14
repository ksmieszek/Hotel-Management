<?php
    require __DIR__.'/auth.php';

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\KlientController;
    use App\Http\Controllers\PokojController;
    use App\Http\Controllers\RezerwacjaController;
    use App\Http\Controllers\PracownikController;
    use App\Http\Controllers\DashboardController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::group(['middleware' => 'auth'], function() {
        
        Route::get('/dashboard', [DashboardController::class,'getCurrentNumbersOfReservations'])->name('dashboard');

        Route::get('/reservations', [RezerwacjaController::class,'showAll'])->name('reservations');
        Route::post('/reservations/edit/{id}',[RezerwacjaController::class,'edit']);
        Route::get('/reservations/edit/{id}', [RezerwacjaController::class, 'edit']);
        Route::post('/reservations/update/{id}',[RezerwacjaController::class,'updateRezerwacja'])->name('updateRezerwacja');
        Route::post('/reservations/destroy/{id}',[RezerwacjaController::class,'destroy']);

        Route::get('/clients', [KlientController::class, 'showAll'])->name('clients');
        Route::post('/clients/edit/{id}',[KlientController::class,'edit']);
        Route::get('/clients/edit/{id}', [KlientController::class, 'edit']);
        Route::post('/clients/update/{id}',[KlientController::class,'updateKlient'])->name('updateKlient');
        Route::post('/clients/destroy/{id}',[KlientController::class,'destroy']);

        Route::get('/rooms', [PokojController::class,'showAll'])->name('rooms');
        Route::post('/rooms/edit/{id}',[PokojController::class,'edit']);
        Route::get('/rooms/edit/{id}', [PokojController::class, 'edit']);
        Route::post('/rooms/update/{id}',[PokojController::class,'updatePokoj'])->name('updatePokoj');
        Route::post('/rooms/destroy/{id}',[PokojController::class,'destroy']);

        Route::resource('pracowniks', PracownikController::class,[ "names"=> ['index' => 'pracowniks'] ]);

    });

?>