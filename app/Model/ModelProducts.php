<?php

namespace app\Model;

use app\database\Registry;

class ModelProducts extends Registry
{
    public mixed $id;
    public mixed $name;
    public mixed $price;
    public mixed $stock;
    public mixed $stock_price;
    public mixed $count;
    public mixed $vis;


    function __construct()
    {
        $this->id = $_POST['id'];
        $this->name = $_POST['name'];
        $this->price = $_POST['price'];
        $this->stock = $_POST['stock'];
        $this->stock_price = $this->price - $this->percent($_POST['price'], $_POST['stock']) . " смн.";
        $this->count = $_POST['count'];
        $this->vis = $_POST['vis'];
        parent::__construct();
    }

    function fetchProduct(): bool|array
    {
        return $this->Sql("SELECT * FROM `products`");
    }

    function updateProduct(): bool|array
    {
        return $this->Sql("UPDATE `products` SET name = '$this->name', price = '$this->price', stock = '$this->stock', stock_price = '$this->stock_price', count = '$this->count', vis = '$this->vis' WHERE id = $this->id");
    }

    public function insertProduct(): bool|array
    {
        return $this->Sql("INSERT INTO `products` (`name`, `price`, `count`, `vis`) VALUES ('$this->name', '$this->price', '$this->count', '$this->vis')");
    }

    public function deleteProduct(): bool|array
    {
        return $this->Sql("DELETE FROM `products` WHERE id = $this->id");
    }

    function percent($value, $percent): float|int
    {
        $int = str_replace('%', '', $percent);
        $int = intval($int);
        return $value * ($int / 100);
    }

}