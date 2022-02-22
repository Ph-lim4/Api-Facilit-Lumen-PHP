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
//CRUD USER ----------------------------------------------------
$router->get('/user', 'UserController@showAllUsers');   

$router->group(['prefix' => 'user'], function () use($router){
    //CRUD
    $router->post('/create', 'UserController@createUser');

    $router->get('/{id}', 'UserController@readUser');

    $router->post('/{id}/update', 'UserController@updateUser');

    $router->delete('/{id}/delete', 'UserController@deleteUser');
});

$router->post('/info', 'UserController@showAuthenticatedUser');

$router->post('logout', 'UserController@logoutUser');


//CRUD shop ----------------------------------------------------
$router->get('/shops', 'ShopController@showAllShops');   

$router->group(['prefix' => 'shops'], function () use($router){
    //CRUD
    $router->post('/create', 'ShopController@createShop');

    $router->get('/{id}', 'ShopController@readShop');

    $router->put('/{id}/update', 'ShopController@updateShop');

    $router->delete('/{id}/delete', 'ShopController@deleteShop');
});

//CRUD SERVIÇO ----------------------------------------------------
$router->get('/services', 'ServiceController@showAllServices');   

$router->group(['prefix' => 'services'], function () use($router){
    //CRUD
    $router->post('/create', 'ServiceController@createService');

    $router->get('/{id}', 'ServiceController@readService');

    $router->put('/{id}/update', 'ServiceController@updateService');

    $router->delete('/{id}/delete', 'ServiceController@deleteService');
});

//CRUD type ----------------------------------------------------
$router->get('/types', 'typeController@showAllTypes');  

$router->group(['prefix' => 'types'], function () use($router){
    //CRUD
    $router->post('/create', 'typeController@createType');

    $router->get('/{id}', 'typeController@readType');

    $router->put('/{id}/update', 'typeController@updateType');

    $router->delete('/{id}/delete', 'typeController@deleteType');
    });

//CRUD Worker ----------------------------------------------------
$router->get('/workers', 'workerController@showAllWorkers');  

$router->group(['prefix' => 'workers'], function () use($router){
    //CRUD
    $router->post('/create', 'workerController@createWorker');

    $router->get('/{id}', 'workerController@readWorker');

    $router->put('/{id}/update', 'workerController@updateWorker');

    $router->delete('/{id}/delete', 'workerController@deleteWorker');
    });

//CRUD Schedules ----------------------------------------------------
$router->get('/schedules', 'scheduleController@showAllSchedules');  

$router->group(['prefix' => 'schedules'], function () use($router){
    //CRUD
    $router->post('/create', 'scheduleController@createSchedule');

    $router->get('/{id}', 'scheduleController@readSchedule');

    $router->put('/{id}/update', 'scheduleController@updateSchedule');

    $router->delete('/{id}/delete', 'scheduleController@deleteSchedule');
    });

//Login ------------------------------
    $router->group(['prefix' => 'api'], function () use ($router) {
        // Matches "/api/register
      // $router->post('register', 'AuthController@register');
   
         // Matches "/api/login
        $router->post('login', 'UserController@loginUser');
   });

   //CRUD Times ----------------------------------------------------
$router->get('/times', 'scheduleController@showAllTimes');  

$router->group(['prefix' => 'times'], function () use($router){
    //CRUD
    $router->post('/create', 'timeController@createTime');

    $router->get('/{id}', 'timeController@readTime');

    $router->put('/{id}/update', 'timeController@updateTime');

    $router->delete('/{id}/delete', 'timeController@deleteTime');
    });