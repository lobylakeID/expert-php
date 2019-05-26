<?php

namespace System\Autowork;

class Executer {

    private static $before_controller_path = APPPATH. '/autoworks/before_controller';

    private static $after_controller_path = APPPATH. '/autoworks/after_controller';

    public static function before(string $file_name='', string $class_name='', array $method=[]){

        $path = self::$before_controller_path . '/' . $file_name;

        if(file_exists($path)){

            include $path;

            if(class_exists($class_name)){

                $obj = new $class_name();

                foreach($method as $m){

                    if(method_exists($obj, $m)){

                        $obj->$m();

                    }

                }

            }

        }

    }

    public static function after(string $file_name='', string $class_name='', array $method=[]){

        $path = self::$after_controller_path . '/' . $file_name;

        if(file_exists($path)){

            include $path;

            if(class_exists($class_name)){

                $obj = new $class_name();

                foreach($method as $m){

                    if(method_exists($obj, $m)){

                        $obj->$m();

                    }

                }

            }

        }
        
    }

}