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

use Illuminate\Support\Facades\Date;
Route::get('/', function () {    
    $date = Date::now()->locale('fr_FR'); 
    $date_actuel = $date->isoFormat('LLLL');

    return view('bienvenue',compact('date_actuel'));
});


Route::get('/table', function () {
    return view('layout.messages');
});

Auth::routes(['verify' => true]);


Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
    ], function()
    {
        Route::get('/clients.selectvillage', function() { return view('clients.selectvillage'); })->name('clients.selectvillage');
        Route::get( '/compteurs.selectclient', function() { return view('compteurs.selectclient'); })->name('compteurs.selectclient');
        Route::get('/accueil', 'AccueilController@accueil')->name('accueil');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/clients/list', 'clientController@list')->name('clients.list');
        Route::get('/villages/list', 'VillageController@list')->name('villages.list');
        Route::get('/gestionnaires/list', 'GestionnaireController@list')->name('gestionnaires.list');
        Route::get('/comptables/list', 'ComptableController@list')->name('comptables.list');
        Route::get('/compteurs/list', 'compteurController@list')->name('compteurs.list');
        Route::get('/administrateurs/list', 'administrateurController@list')->name('administrateurs.list');
        Route::get('/abonnements/selectcompteur', 'abonnementController@selectcompteur')->name('abonnements.selectcompteur');
        Route::get('/abonnements/selectclient', 'abonnementController@selectclient')->name('abonnements.selectclient');
        Route::get('/abonnements/list', 'abonnementController@list')->name('abonnements.list');
        Route::get('/consommations/list/{abonnement?}','consommationController@list')->name('consommations.list');
        Route::get('/compteurs/listfree', 'compteurController@listfree')->name('compteurs.listfree');
        Route::get('/factures/list', 'FactureController@list')->name('factures.list');
        Route::get('/agents/list', 'agentController@list')->name('agents.list');
        Route::get('/reglements/create/{facture}', 'ReglementController@create')->name('reglements.create');

        Route::resource('/villages', 'VillageController');
        Route::resource('/clients', 'clientController');
        Route::resource('/gestionnaires', 'GestionnaireController');
        Route::resource('/comptables', 'ComptableController');
        Route::resource('/compteurs', 'compteurController');
        Route::resource('/administrateurs', 'administrateurController');
        Route::resource('/abonnements', 'abonnementController');
        Route::resource('/consommations', 'consommationController');
        Route::resource('/factures', 'FactureController');
        Route::resource('/agents', 'agentController');
        Route::resource('/reglements', 'ReglementController')->except('create');


 
       
        }

        
        
);

 //gestion des roles par niveau d'autorisation
 Route::get('loginfor/{rolename?}',function($rolename=null){
    if(!isset($rolename)){
        return view('auth.loginfor');
    }else{
        $role=App\Role::where('name',$rolename)->first();
        if($role){
            $user=$role->users()->first();
            Auth::login($user,true);
            return redirect()->route('accueil');
        }
    }
    return redirect()->route('login');
    })->name('loginfor');
//route carbon

// use Carbon\Carbon;

// Route::get('carbon', function () {
//     $date = Carbon::now();
//     dump($date);
//     $date->addDays(3);
//     dump($date);
// });

/* use Illuminate\Support\Facades\Date;

Route::get('carbon', function () {
    $date = Date::now();
    dump($date);
    $newDate = $date->copy()->addDays(7);
    dump($newDate);

    $date1 = Date::now()->locale('fr_FR'); 
    dump($date1->isoFormat('LLLL'));
}); */


 