<?php

use App\Http\Modules\Test\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('test', [TestController::class, 'test']);
