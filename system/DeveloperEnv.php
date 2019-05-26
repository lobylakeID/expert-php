<?php

$devstatus = $webstatus ?? 'developing';
switch($devstatus):
    case 'developing':
        error_reporting(-1);
        break;
    case 'live':
        error_reporting(1);
        break;
    default:
        error_reporting(-1);
endswitch;