<?php

use System\Loader\Loader as load;

class Model_test {

    public function hello(){

        load::resource();
        echo "Hello World!";

    }    

}