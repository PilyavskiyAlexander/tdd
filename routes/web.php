<?php

use Illuminate\Routing\Router;
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
    $data['tasks'] = ['test', 'test2', 'test3'];
    return view('welcome', $data);
});

$router->group(['prefix' => 'threads'], function(Router $router){
    $router->get('/', ['as' => 'all_threads', 'uses' => 'ThreadController@index']);
    $router->get('/{thread}', ['as' => 'show_thread', 'uses' => 'ThreadController@show']);

    $router->group(['middleware' => 'auth'], function(Router $router){
        $router->post('/{thread}/replies', ['as' => 'thread_repliers', 'uses' => 'ReplyController@store']);
    });
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
