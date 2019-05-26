<?php

# $webstatus = 'developing';

/**
 * --------------------------------------------------------------
 * STARTING SESSION
 * --------------------------------------------------------------
 * Bertujuan untuk menerima data dengan metode POST, hal ini
 * disebabkan oleh masalah yang terjadi pada saat transfer data
 * melalui metode POST. Karena itu kami membuat sebuah solusi
 * untuk mengatasinya dengan cara mendeklarasikannya terlebih
 * dahulu pada file /app/post. Anda bisa membuat file dan
 * mendeklarasikan logika-logika yang ingin anda taruh di sana.
 * Selain itu, starting session dibawah dapat memudahkan
 * developer untuk membuat session-session tanpa harus
 * mengaktifkannya terlvebih dahalu.
 * Untuk info lebih lanjut,silahkan cek user guide pada 
 * website kami.
 * 
 * @author lobylake
 * @package expert-php
 */
session_start();

/**
 * ------------------------------------------------------------
 * PHP VERSION CHECKER
 * ------------------------------------------------------------
 * Bertujuan untuk mengecek versi interpreter PHP anda. Dalam
 * distribusi Expert PHP 1.0, minimal versi interpreter anda
 * adalah PHP 7. Jika anda belum memilikinya, silahkan cek
 * user guide pada website kami.
 * 
 * @author lobylake
 * @package expert-php
 */
if(phpversion() < 7){

    exit;

}

/**
 * ------------------------------------------------------------
 * DEVELOPER ENVIRONMENT
 * ------------------------------------------------------------  
 * Sebuah logika yang mengatur lingkungan kerja developer.
 * Jika lingkungan kerjanya adalah 'developing', maka sistem
 * akan mengaktifkan laporan error yang terjadi(error_reporting),
 * sedangkan jika lingkungan kerjanya adalah 'live', maka sistem
 * akan menonaktifkan laporan error yang terjadi.
 * 
 * @author lobylake
 * @package expert-php 
 */
include '../system/DeveloperEnv.php';

/**
 * ------------------------------------------------------------
 * REQUERING BASE CONSTANTA
 * ------------------------------------------------------------
 * Berfungsi sebagai pedoman bagi path-path file system dan
 * File Constanta.php yang berada pada /system/Constanta.php
 * juga path-path yang dibutuhkan oleh developer itu sendiri.
 * 
 * @author lobylake
 * @package expert-php
 */
require '../system/Constanta.php';

require SYSPATH. '/Database/Database.php';

include SYSPATH. '/Updater/Updater.php';

require SYSPATH. '/Autowork/Autowork.php';

require SYSPATH. '/Loader/Loader.php';

/**
 * ------------------------------------------------------------
 * SYSTEM RENDERING WEB PAGES AND CONFIGS
 * ------------------------------------------------------------
 * Fungsi file-file yang di require di bawah yaitu menjalankan/
 * meng-execute semua yang di request oleh user, baik berupa
 * web pages, atau sebuah file json untuk pengembangan 
 * web kedua.
 * 
 * @author lobylake
 * @package expert-php
 */

require SYSPATH. '/Post/PostFunction.php';
require APPPATH. '/autoworks/before.php';
require SYSPATH. '/Router/Routes.php';
require APPPATH. '/autoworks/after.php';