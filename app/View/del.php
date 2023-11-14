<?php
require "../../vendor/autoload.php";

use app\Controller\ControllerProducts;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o = new ControllerProducts();
    $o->deleteProduct();
    Header("Location: http://adminmvc/?page=products");
}