<?php

use System\Router\Route;
use System\Loader\Loader as load;

Route::get(['/', '/welcome', '/welcome/', '/welcome/index', '/welcome/menyapa'], function(){

    load::controller('welcome', 'main');

});

Route::get(['/welcome/read_form_data'], function(){

    load::controller('welcome', 'get_data');

});