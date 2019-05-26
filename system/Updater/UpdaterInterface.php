<?php

namespace System\Updater;

interface iUpdater {

    public static function getUpdater();
    public static function runUpdater();
    public static function resetExpertPHP();
    public static function downloadLatestVerion();

} 