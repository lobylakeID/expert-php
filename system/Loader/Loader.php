<?php

namespace System\Loader;

require SYSPATH. '/Loader/LoaderInterface.php';
require SYSPATH . '/Loader/LoaderRenderMethod.php';

class Loader extends \System\Loader\Render {

    public static function controller(string $file_name='', string $index_method_name='index', array $param=[]){

        $class_name = ucfirst($file_name);
        $file_name.='.php';
        $file_path = APPPATH. '/controllers/' . $file_name;

        if(file_exists($file_path)){

            return parent::_controller_render(true, $file_path, $class_name, $index_method_name, $param);

        }else{

            parent::_controller_render(false, $file_path);

        }

    }
    public static function view(string $file_name='', array $var_export=array()){

        $file_name.='.php';
        $file_path = APPPATH. '/views/' . $file_name;

        if(file_exists($file_path)){

            parent::_view_render(true, $file_path, $var_export);

        }else{

            parent::_view_render(false, $file_path);

        }

    }
    public static function model(string $file_name){

        $class_name = ucfirst($file_name);
        $file_name.='.php';
        $file_path = APPPATH. '/models/' . $file_name;

        if(file_exists($file_path)){

            return parent::_model_render(true, $file_path, $class_name);

        }else{

            parent::_model_render(false, $file_path);

        }

    }
    public static function class(string $file_name=''){

        $sys_file_path = SYSPATH. '/Class/' . $file_name . '.php';
        $app_file_path = APPPATH. '/class/' . $file_name . '.php';

        $class_name = ucfirst($file_name);

        return parent::_class_render($sys_file_path, $app_file_path, $class_name);

    }
    public static function function(string $file_name){



    }
    public static function resource(string $path='@/'){

        $base = str_replace('@', '', $path);
        $base = explode('/', $base);

        $file_path = APPPATH. '/resources/' . $base[0] . '.php';
        $master_array_key = $base[0];
        $array_key = $base[1];

        if(file_exists($file_path)){

            include $file_path;

            return isset($_RES[$master_array_key][$array_key]) ? $_RES[$master_array_key][$array_key] : 'Array not found...';

        }

    }
    public static function package(string $file_name=''){

        $file_path = APPPATH. '/packages/' . $file_name;

        return file_exists($file_path) ? parent::_package_render(true, $file_path) : parent::_package_render(false, $file_path);

    }

    public static function post_userdata(string $master_array_key='', string $child_array_key=''){

        return isset($_SESSION['POST'][$master_array_key][$child_array_key]) ? $_SESSION[$master_array_key][$child_array_key] : '';

    }

}