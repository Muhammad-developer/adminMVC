<?php

namespace app\Controller;

use app\View\View;

class Controller
{
    public $model;
    public View $view;

    function __construct()
    {
        $this->view = new View();
    }

    function actionIndex()
    {
    }
}