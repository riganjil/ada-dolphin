<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->post('auth/login',['uses' => 'AuthController@authenticate']);

$router->group(
    ['middleware' => 'jwt.auth'],
    function() use ($router) {
        $router->get('users', function() {
            $users = \App\User::all();
            return response()->json($users);
        });

        $router->group(['prefix' => 'checklist'], function ($router){
            $router->post('complete',['uses' => 'ChecklistController@complete_post']);
            $router->post('incomplete',['uses' => 'ChecklistController@incomplete_post']);
        });

        $router->group(['prefix' => 'service'], function ($router){
            $router->get('/',['uses' => 'ServiceController@index']);
            $router->post('incomplete',['uses' => 'ChecklistController@incomplete_post']);
        });
    }
);