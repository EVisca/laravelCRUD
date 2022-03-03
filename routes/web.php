<?php

//use Illuminate\Support\Facades\Route;

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

// in theory, the path 'UserController@showUsers' would suffice,
//instead was needed to be set as 'App\Http\Controllers\UserController@showUsers'
//due to error with "UserController class could not be found"
Route::get('/', 'App\Http\Controllers\UserController@showUsers');
//no momento indo na última listagem, mostrando uma coleção com 2 usuários


//Inicio Routes IV.5
Route::get('/users/user/{id}', 'App\Http\Controllers\UserController@showUser');
/*fazer esse teste usando a URL: http://laravelcrud.test/users/user/1 ou http://laravelcrud.test/users/user/2
Output apresentado foi o esperado. Tudo certo até então
como para esse teste a mesma function do showUsers() é feita de forma diferente (Mudado para
showUsersWithId($id)), para o 1º Route nesse arquivo, esse 1º route retorna tela de 404.
===>>>>>>>  Agora fazer de fato o CRUD  <<<<<<<<<<<======
*/
//Fim routes IV.5


//Incio Create user in database
Route::get('/users/create','App\Http\Controllers\UserController@CreateUser');
Route::post('/users/create', 'App\Http\Controllers\UserController@saveUser')->name('createuser');
//Fim Create user in database

//Inicio Display and Update Users
Route::get('/users','App\Http\Controllers\UserController@displayUsers');
Route::get('/users/view/{id}','App\Http\Controllers\UserController@viewUser')->name('viewuser');
//Route::get('/users/view','App\Http\Controllers\UserController@updateUser')->name('updateuser');
Route::post('/users/update/{id}','App\Http\Controllers\UserController@updateUser')->name('updateuser');


//Route para remoção de usuários
Route::post('/users/delete/{id}','App\Http\Controllers\UserController@deleteUser')->name('deleteuser');

//Fim Display and Update Users


/*  basic test usage for Routes
Route::get('/', function () {
    //return view('welcome'); //default view
    //dd('welcome');
    
    //$name = 'Miami Heat';

    //array with data example:
    $data['name'] = 'Miami Heat';
    $data['conference'] = 'East';
    //teste para o view no home.blade.php: //test {{$data['name']}} {{$data['conference']}} 
    


    //return view('home', compact('name'));
    return view('home', compact('data'));
    //if the name.blade.php is within a folder inside 'view', then it is required to be
    //called by: return view(folderame.nameFromTheBladeFile); or (folder.subfolder.BladeFile); and so on
    //example: return view(homepage.home);
}); */

/*

Route::get('/admin', function () {
    //return view('welcome'); //default view
    dd('welcome to the admin page');
});

Route::get('/admin/users/{id}', function ($id) {
    //return view('welcome'); //default view
    dd('welcome to the admin page' . 'user ' .  $id);
});

*/