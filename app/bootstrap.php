<?php
require "vendor/autoload.php";

// подключаем файлы ядра
use app\Route\Route;
$uri = (new Route())->uri;
if ($uri === "") {
    include_once "app/View/LoginView.php";
}else{
    Route::start();
}
//echo session_id();




