<?php

session_start();

if(phpversion() < 7){

    exit();

}

require '../system/Constanta.php';

require SYSPATH. '/Post/PostFunction.php';

require SYSPATH. '/Loader/Loader.php';

require SYSPATH. '/Router/Routes.php';
