<?php

use App\Http\Controllers\CarroController;
use App\Models\Marca;
use App\Http\Livewire\ShowCitas;
use App\Http\Livewire\ShowMarcas;
use App\Http\Livewire\ShowArticles;
use App\Http\Livewire\ShowCategories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\{File,Hash};
use Illuminate\Support\Str;

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
})->name('inicio');

//En este middleware entrará cualquier usuario autenticado
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/articles', ShowArticles::class)->name('articulos.show');
    Route::get('/citas', ShowCitas::class)->name('citas.show');
    // Rutas del carro
    Route::resource('/carro', CarroController::class);
    Route::delete('clear', [CarroController::class, 'clear'])->name('carro.clear');
});

//En este middleware entrará cualquier usuario autenticado y que sea administrador
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'is_admin'
])->group(function () {
    Route::get('/categories', ShowCategories::class)->name('categorias.show');
    Route::get('/marcas', ShowMarcas::class)->name('marcas.show');
});

//Rutas para formulario de contacto
Route::get('contacto', [MailController::class, 'pintarFormulario'])->name('contacto.pintar');
Route::post('contacto', [MailController::class, 'procesarFormulario'])->name('contacto.procesar');

//Rutas para login con redes sociales
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    // Realizo un try-catch para comprobar que el usuario se halla logueado anteriormente con Google
    try{
        $user = Socialite::driver('google')->user();
    }catch(\Exception $e){
        return redirect('/dashboard')->with('error', 'Fallo con conexión a Google');
    }
    //Creamos una variable para comprobar si existe el usuario
    $userExists = User::where('external_id', $user->id)
        ->where('external_auth', 'google')
        ->first();
    
    //Si el usuario ya existe le hacemos login, si no, lo creamos cogiendo los campos que da Google
    if ($userExists) {
        Auth::login($userExists);
    } else {
        // Si el usuario no esta creado, primero comprueba si existe el email en la base de datos,
        // si no existe el email crea todo el usuario, si el email existe reemplaza los valores del usuario
        // en relación a Google Auth
        if(User::where('email',$user->email)->count()){
            dd('encontrado');
            $newUser = User::update([
                'avatar' => $user->avatar,
                'external_id' => $user->id,
                'external_auth' => 'google',
                'email_verified_at' => now(),
            ]);
        } else {
            $pass = Str::random(16);
            
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($pass),
                'avatar' => $user->avatar,
                'external_id' => $user->id,
                'external_auth' => 'google',
                'email_verified_at' => now(),
            ]);
            //Al crearlo hacemos login
            Auth::login($newUser);
            return redirect('/dashboard')->with('login',$pass);
        }
        //Al crearlo hacemos login
        Auth::login($newUser);
    }
    return redirect('/dashboard');
});
