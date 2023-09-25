<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\Relationships;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

JsonApiRoute::server('blog')->resources(function (ResourceRegistrar $server) {
    $server->resource('posts', JsonApiController::class)
        ->readOnly()
        ->relationships(function (Relationships $relations) {
            $relations->hasOne('author')->readOnly();
            $relations->hasMany('comments')->readOnly();
            $relations->hasMany('tags')->readOnly();
        });;
});
