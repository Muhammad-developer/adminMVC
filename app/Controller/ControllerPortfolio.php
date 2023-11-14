<?php

namespace app\Controller;

use app\Model\ModelPortfolio;
use app\View\View;

class ControllerPortfolio extends Controller
{
    function __construct()
    {
        $this->model = new ModelPortfolio();
        $this->view = new View();
    }

    function actionIndex(): void
    {
        $data = $this->model->get_data();
        $this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
}