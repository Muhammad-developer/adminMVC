<?php

namespace app\Controller;

use app\Model\ModelLogin;

class ControllerLogin extends Controller
{

    public ModelLogin $out;
    public array|bool $result;

    function __construct()
    {
        parent::__construct();
        $con = $this->out = new ModelLogin();
        $this->result = $con->fetchLogin();
    }

    function actionIndex(): void
    {
        $out = new Controller();
        $out->view->generate('LoginView.php');
    }

    public function adminPage(): void
    {
        $this->view->generate('DashboardView.php');
    }
}