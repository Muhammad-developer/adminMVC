<?php
require "../../vendor/autoload.php";
use app\Controller\ControllerLogin;
use app\Route\Route;

$out = new ControllerLogin();
$res = $out->result;

foreach ($res as $r) {

}
if (!empty($r)) {
    Header("Location: HTTP://adminMVC/admin");
} else {
    Header("Location: HTTP://adminMVC/?page=error");
}

