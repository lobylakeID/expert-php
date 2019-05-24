<?php

use System\Loader\Loader as load;

class Welcome {

    public function __construct(){

        $this->model    = load::model('model_test');
        $this->name     = load::resource('@strings/name');
        $this->nickname = load::resource('@strings/nickname');
        $this->old      = load::resource('@strings/old');
        $this->from     = load::resource('@strings/from');

    }

    public function main(){

        echo get_post_userdata('welcome', 'username');
        load::view('welcome_view', ['title'=>$this->menyapa(), 'jquery'=>load::package('jquery-3.3.1.js')]);

    }

    public function menyapa(){

        return "Hallo nama lengkap saya $this->name. Di sekolah saya biasa dipanggil<br>".
        "dengan sebutan $this->nickname. Umur saya $this->old tahun dan saya berasal dari negara $this->from";

    }

    public function form(){

        load::view('welcome_form');

    }

    public function get_data(){

        echo load::post_userdata('welcome', 'username');

    }

}