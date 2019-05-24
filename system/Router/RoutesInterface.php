<?php

namespace System\Router;

interface iRoutes {

    public static function get(array $uri, $action, bool $base_uri=TRUE);
    public static function default($action);

}