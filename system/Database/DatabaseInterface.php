<?php

namespace System\Database;

interface iDatabase {

    public static function connect();
    public static function if_not_connect();
    public static function select_db();
    public static function query();
    public static function builder();
    public static function close();

}