<?php

namespace app\Controller;

use app\Model\ModelFetchData;

class ControllerFetchData extends Controller
{
//    public ModelFetchData $out;
    public array|false $result;
    function __construct()
    {
        parent::__construct();
        $con = $this->model = new ModelFetchData();
        $this->result = $con->fetchUser();
    }
    function actionIndex(): void
    {
        if ($_GET['page'] == 'users'){
            $this->view->generate('DashboardView.php');
        }
    }
}