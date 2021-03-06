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

    $router->group(['middleware' => 'auth'], function(Router $router){
        $router->get('/create', ['as' => 'create_thread_view', 'uses' => 'ThreadController@create']);
        $router->post('/', ['as' => 'create_thread', 'uses' => 'ThreadController@store']);
        $router->get('/{user}', ['as' => 'user_threads', 'uses' => 'ThreadController@show_user_threads'])->where('user', '[0-9]+');;
        $router->post('/{thread}/replies', ['as' => 'thread_repliers', 'uses' => 'ReplyController@store']);

    });

    $router->get('/{channel}', ['as' => 'show_channel', 'uses' => 'ChannelController@show']);
    $router->get('/{channel}/{thread}', ['as' => 'show_thread', 'uses' => 'ThreadController@show'])->where('thread', '[0-9]+');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
