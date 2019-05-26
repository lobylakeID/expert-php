<?php

namespace System\Database;

class Builder {

    private $connection;

    public $count_data_from_table = 0;

    public $last_query = 'Null query';

    public function __construct($connection){

        $this->connection = $connection;

    }

    public function insert(string $to='', array $data=[]){

        $result = '';

        for($i = 0; $i < count($data); $i++){

            $value = $data[$i];

            if($data[$i] === null){

                if(isset($data[($i+1)])){

                    $result.="NULL, ";

                }else{

                    $result.="NULL";

                }
                
            }else if(is_string($data[$i])){

                if(isset($data[($i+1)])){

                    $result.="'$value', ";

                }else{

                    $result.="'$value'";

                }

            }else if(is_int($data[$i])){

                if(isset($data[($i+1)])){

                    $result.="$value, ";

                }else{

                    $result.="$value";

                }

            }else{

                if(isset($data[($i+1)])){

                    $result.="$value, ";

                }else{

                    $result.="$value";

                }

            }

        }
    
        $this->last_query = "INSERT INTO $to VALUES($result)";
        return mysqli_query($this->connection, "INSERT INTO $to VALUES($result)");

    }

    public function create_database(string $db_name=''){

        return mysqli_query($this->connection, "CREATE DATABASE $db_name");

    }

    public function drop_database(string $db_name=''){

        return mysqli_query($this->connection, "DROP DATABASE $db_name");

    }

    public function drop_table(string $table_name=''){

        return mysqli_query($this->connection, "DROP TABLE $table_name");

    }

    public function get_data_from_table(string $table_name='', string $from='*', int $limit=0){

        $result = mysqli_query($this->connection, "SELECT $from FROM $table_name");

        $output = [];

        $i = 0;

        while($lines = mysqli_fetch_assoc($result)){

            if($limit > 0){

                if($limit == $i){

                    break;

                }

            }

            foreach(array_keys($lines) as $key){
                    
                $output[$i][$key] = $lines[$key];

            }

            $i++;

        }

        $this->count_data_from_table = $i;
        return $output;
        
    }

    public function last_query(){

        return $this->last_query;

    }

}