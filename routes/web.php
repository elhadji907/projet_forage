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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('layout.index');
});

Route::get('/table', function () {
    return view('layout.tables');
});
Route::get('/login1', function () {
    return view('layout.login1');
});

/*
taper cette commande pour afficher le contenu ci dessous
php artisan make:auth
*/
Auth::routes();

Route::get( '/clients.selectvillage', function(){
    return view('clients.selectvillage');
})->name('clients.selectvillage');

Route::get( '/compteurs.selectclient', function(){
    return view('compteurs.selectclient');
})->name('compteurs.selectclient');

 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clients/list', 'clientController@list')->name('clients.list');
Route::get('/villages/list', 'VillageController@list')->name('villages.list');
Route::get('/compteurs/list', 'compteurController@list')->name('compteurs.list');
Route::get('/administrateurs/list', 'administrateurController@list')->name('administrateurs.list');
Route::get('/agents/list', 'agentController@list')->name('agents.list');
Route::get('/agents/list', 'agentController@list')->name('agents.list');
Route::get('/abonnements/selectcompteur', 'AbonnementController@selectcompteur')->name('abonnements.selectcompteur');
Route::get('/abonnements/selectclient', 'AbonnementController@selectclient')->name('abonnements.selectclient');
Route::get('/abonnements/list', 'abonnementController@list')->name('abonnements.list');
Route::get('/consommations/list/{abonnement?}','ConsommationController@list')->name('consommations.list');

Route::resource('/villages', 'VillageController');
Route::resource('/clients', 'clientController');
Route::resource('/compteurs', 'compteurController');
Route::resource('/administrateurs', 'administrateurController');
Route::resource('/agents', 'agentController');
Route::resource('/abonnements', 'abonnementController');
Route::resource('/consommations', 'ConsommationController');