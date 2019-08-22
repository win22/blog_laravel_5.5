<?php

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




Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@connexion');

Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@inscription');

Route::group([
        'middleware' => 'App\Http\Middleware\Auth'
], function (){
    Route::get('/', 'UtilisateursController@acceuil');
    Route::get('/', 'UtilisateursController@list');

    Route::get('/mon-compte', 'CompteController@acceuil');
    Route::get('/deconnexion','CompteController@deconnexion');

    Route::post('modification-du-mot-de-passe', 'CompteController@ModificationPassword');

    Route::post('/messages', 'MessagesConroller@nouveau');

    Route::get('/{email}', 'UtilisateursController@voir');

    Route::post('/{email}', 'SuivisController@nouveau');
    Route::delete('/{email}', 'SuivisController@retirer');

});



