<?php

define('MASTERPATH', __DIR__. '/..');

define('APPPATH', MASTERPATH . '/app');

define('SYSPATH', MASTERPATH . '/system');

define('THIS_DOMAIN', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

$uri = explode('?', $_SERVER['REQUEST_URI']);
define('THIS_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $uri[0]);