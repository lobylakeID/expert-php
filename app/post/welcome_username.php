<?php

if(isset($_POST['btnUsername'])){

    echo "Test";
    set_post_userdata('welcome', 'username', THIS_DOMAIN . '/welcome/form/read_form_data');

}

if(isset($_POST['btnSubmit'])){

    set_post_userdata('welcome', 'username');
    
}