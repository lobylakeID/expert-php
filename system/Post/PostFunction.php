<?php

function set_post_userdata(string $master_array_key='', string $child_array_key='', string $redirect=''){

    $_SESSION['POST'][$master_array_key][$child_array_key] = $_POST[$child_array_key];

    /*if($redirect !== ''){

        header('location:' . $redirect);

    }*/

}

function get_post_userdata(string $master_array_key='', string $child_array_key=''){

    return isset($_SESSION['POST'][$master_array_key][$child_array_key]) ? $_SESSION['POST'][$master_array_key][$child_array_key] : '';

}

$dir = scandir(APPPATH. '/post');
for($i = 2; $i < count($dir); $i++){

    include APPPATH. '/post/' . $dir[$i];

}