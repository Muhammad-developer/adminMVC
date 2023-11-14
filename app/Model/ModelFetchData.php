<?php

namespace app\Model;
use app\Controller\ControllerUsers;
use app\database\Registry;

class ModelFetchData extends Registry
{

    public function fetchUser(): bool|array
    {
        $controller = new ControllerUsers();
        $admin = $controller->admin;
        $manager = $controller->manager;
        if ($admin){
            return  $this->Sql("SELECT * FROM  users JOIN role ON users.role_id = role.id WHERE name_role = 'admin'");
        }elseif ($manager){
            return  $this->Sql("SELECT * FROM  users JOIN role ON users.role_id = role.id WHERE name_role = 'manager'");
        }
        return $this->Sql("SELECT * FROM  users JOIN role ON users.role_id = role.id");
    }
}