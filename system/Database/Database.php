<?php

namespace System\Database;

require SYSPATH. '/Database/DatabaseInterface.php';

class Database implements iDatabase {

    private static $connection;
    private static $builder;
    private static $query;
    private static $hostaname;
    private static $username;
    private static $password;
    private static $database;
    private static $port = 3306;

    public static function connect(string $hostname='', string $username='', string $password='', string $database=''){

        self::$hostaname = $hostname;
        self::$username = $username;
        self::$password = $password;
        self::$database = $database; 

        self::$connection = mysqli_connect(self::$hostaname, self::$username, self::$password, self::$database);

    }
    public static function if_connect(string $message='Database connected'){

        return (self::$connection) ? $message : '';

    }
    public static function if_not_connect(string $message='Database not connected'){

        return (!self::$connection) ? $message : '';

    }
    public static function select_db(string $db_name=''){

        return mysqli_select_db(self::$connection, $db_name);

    }
    public static function query(string $query=''){

        self::$query = $query;

        return mysqli_query(self::$connection, self::$query);

    }
    public static function builder(){

        return self::$builder;

    }
    public static function builder_setup(){

        include SYSPATH. '/Database/Builder.php';
        self::$builder = new Builder(self::$connection);

    }
    public static function close(){

        return mysqli_close(self::$connection);

    }

}