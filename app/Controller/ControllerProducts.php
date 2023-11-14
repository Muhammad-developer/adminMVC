<?php

namespace app\Controller;

use app\Model\ModelProducts;

class ControllerProducts extends Controller
{

//    public ModelProducts $out;
    public array|bool $result;
    public array|bool $updateProduct;

    function __construct()
    {
        parent::__construct();
        $this->model = new ModelProducts();
        $this->result = $this->model->fetchProduct();
    }
    function updateProduct(): void
    {
        $this->updateProduct = $this->model->updateProduct();
    }

    public function insertProduct(): void
    {
        $this->updateProduct = $this->model->insertProduct();
    }
    public function deleteProduct(): void
    {
        $this->updateProduct = $this->model->deleteProduct();
    }
}