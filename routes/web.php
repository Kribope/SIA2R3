<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);//get all users
});

//more simple routes
$router->get('/users', 'UserController@index'); // indexing
$router->post('/users', 'UserController@addUser'); //create new user
$router->get('/users/{id}', 'UserController@show'); // get user by id
$router->put('/users/{id}', 'UserController@update'); // update user
$router->patch('/users/{id}', 'UserController@update'); // update user
$router->delete('/users/{id}', 'UserController@delete'); // delete user

//Job routes
$router->get('/usersjob', 'UserJobController@index'); 
$router->get('/userjob/{id}', 'UserJobController@show'); // get user by id