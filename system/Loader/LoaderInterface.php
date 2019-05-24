<?php

namespace System\Loader;

interface iLoader {

    public static function controller();
    public static function view();
    public static function model();
    public static function class();
    public static function function();
    public static function resource();

}