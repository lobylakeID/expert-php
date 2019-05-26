<?php

namespace System\Router;

require SYSPATH. '/Router/RoutesInterface.php';

class Route implements iRoutes {

    private static $basic_uri = '';

    private static $base_uri = '';

    public static $logic_result;

    private static function _set(){

        $uri = $_SERVER['REQUEST_URI'];

        $base_uri = explode('?', $uri);

        self::$basic_uri = $uri;

        self::$base_uri = $base_uri[0];

        self::_get_from_uri_render();

    }

    private static function _get_from_uri_render(){

        $uri = $_SERVER['REQUEST_URI'];

        $uri_get = explode('?', $uri);

        if(isset($uri_get[1])){

            $data = explode('&', $uri_get[1]);

            for($i = 0; $i < count($data); $i++){

                $get = explode('=', $data[$i]);

                if(!isset($get[1])){
                    $get[1] = '';
                }
                $_GET[$get[0]] = $get[1];

            }

        }

    }

    public static function default($action){

        return isset($action) ? $action() : '';

    }

    public static function get(array $uri=['/'], $action, bool $base_uri=true){

        self::_set();

        if($base_uri !== false){

            foreach($uri as $u){

                if($u == self::$base_uri){

                    $action();

                    self::$logic_result = true;

                    exit;

                    break;

                }else{

                    self::$logic_result = false;

                }

            }

        }else{

            foreach($uri as $u){

                if($u == self::$basic_uri){

                    $action();

                    self::$logic_result = true;

                    exit;

                    break;

                }else{

                    self::$logic_result = false;

                }

            }

        }

        self::_del_property();

    }

    private static function _del_property(){ 

        self::$basic_uri = '';
        self::$base_uri = '';

    }

}


$path = APPPATH. '/routes';
$dir = scandir($path);
for($i = 2; $i < count($dir); $i++){

    include $path. '/' . $dir[$i];

}

include SYSPATH. '/Router/404.php';