<?php

namespace System\Updater;

require SYSPATH. '/Updater/UpdaterInterface.php';
require SYSPATH. '/Updater/UpdaterRenderMethod.php';

class Updater extends UpdaterRenderMethod implements iUpdater {

    private static $loby_lake_url = 'http://lobylakeid.000webhostapp.com';

    private static $id = '';

    public function __construct(){

        self::$id = file_get_contents(SYSPATH.'/Updater/product.id');

    }

    public static function getUpdater(){

        $url = self::$loby_lake_url;
        $id = self::$id;
        $this_domain = THIS_DOMAIN;

        parent::_getUpdater($url, $id, $this_domain);

    }
    public static function runUpdater(){




    }
    public static function resetExpertPHP(){




    }
    public static function downloadLatestVerion(){

        parent::_downloadLatestVersion();

    }

}