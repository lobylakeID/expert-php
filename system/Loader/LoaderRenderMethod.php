<?php

namespace System\Loader;

class Render {

    protected static function _controller_render(bool $status, string $file_path='', string $class_name='', string $method_name='', array $param=[]){

        if($status !== false){

            include $file_path;

            if(class_exists($class_name)){

                $obj = new $class_name;

                if(method_exists($obj, $method_name)){

                    $obj->$method_name($param);

                }

            }

        }else{

            echo getcwd();

        }

    }

    protected static function _view_render(bool $status, string $file_path='', array $var_export=[]){

        if($status !== false){

            foreach($var_export as $var_name => $var_value){

                $$var_name = $var_value;
    
            }
    
            include $file_path;

        }else{

            echo getcwd();

        }

    }

    protected function _model_render(bool $status, string $file_path='', string $class_name=''){

        if($status !== false){

            include $file_path;

            if(class_exists($class_name)){
                    
                return new $class_name;

            }
            
        }else{

            echo getcwd();

        }

    }

    protected static function _package_render(bool $status, string $file_path='', string $type=''){

        if($status !== false){

            return file_get_contents($file_path);

        }else{

            echo getcwd();

        }

    }

    protected static function _class_render(string $sys_path, string $app_path, string $class_name){

        $sys_exists = file_exists($sys_path);
        $app_exists = file_exists($app_path);

        if($sys_exists && $app_exists){

            include $sys_path;
            include $app_path;

            $class_name = 'EXT_'.$class_name;

            return class_exists($class_name) ? new $class_name() : null;

        }else if($sys_exists){

            include $sys_path;

            return class_exists($class_name) ? new $class_name() : null;

        }else if($app_exists){

            include $app_path;

            return class_exists($class_name) ? new $class_name() : null;

        }else{

            echo "Class not found!";

        }

    }   

    protected static function _

}