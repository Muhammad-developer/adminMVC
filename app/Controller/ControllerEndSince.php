<?php

namespace app\Controller;

use app\Model\ModelEndSince;

class ControllerEndSince extends Controller
{
//    public ModelEndSince $end;
    function __construct()
    {
        parent::__construct();
        $this->model = new ModelEndSince();
        $this->model->endSince();
    }
}