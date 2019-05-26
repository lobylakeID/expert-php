<?php

namespace System\Autowork;

require SYSPATH. '/Autowork/AutoworkInterface.php';
require SYSPATH. '/Autowork/Executer.php';

class Autowork implements iAutowork {

    private static $basic_uri='';
    
    private static $base_uri='';

    private static $executer;

    private static function _set(){

        self::$executer = new Executer;

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

    public static function get(array $uri=['/'], bool $base_uri=true){

        self::_set();

        if($base_uri !== false){

            foreach($uri as $u){

                if($u == self::$base_uri){

                    return self::$executer;

                }

            }

        }else{

            foreach($uri as $u){

                if($u == self::$basic_uri){

                    return self::$executer;

                }

            }

        }

        self::_del_property();

    }

    public static function before(string $file_name='', string $class_name='', array $method=[]){

        return self::$executer::before($file_name, $class_name, $method);

    }

    public static function after(string $file_name='', string $class_name='', array $method=[]){

        return self::$executer::after($file_name, $class_name, $method);

    }

    private static function _del_property(){ 

        self::$basic_uri = '';
        self::$base_uri = '';

    }

}