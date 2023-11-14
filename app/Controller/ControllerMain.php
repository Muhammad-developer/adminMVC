<?php

namespace app\Controller;

class ControllerMain extends Controller
{

    function actionIndex(): void
    {
        $this->view->generate(null, 'DashboardView.php');
    }
}