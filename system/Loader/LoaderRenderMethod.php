<?php

namespace System\Loader;

class Render {

    protected static function _controller_render(bool $status, string $file_path='', string $class_name='', string $method_name=''){

        if($status !== false){

            include $file_path;

            if(class_exists($class_name)){

                $obj = new $class_name;

                if(method_exists($obj, $method_name)){

                    $obj->$method_name();

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

}