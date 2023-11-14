<?php

namespace app\Controller;

use app\Model\ModelActiveUser;

class ControllerActiveUser extends Controller
{

    public array|bool $result;
//    public ModelActiveUser $out;

    function __construct()
    {
        parent::__construct();
        $this->model = new ModelActiveUser();
        $this->result = $this->model->activeUser();
    }
}