<?php

namespace app\Controller;

class ControllerUsers
{
    public $admin, $manager;
    function __construct()
    {
         switch ($_GET['role']){
            case 'admin':
                $this->admin();
                break;
            case 'manager':
                $this->manager();
                break;
            default :
                break;
        }
    }

    private function admin(): void
    {
        $this->admin = true;
    }

    private function manager(): void
    {
        $this->manager = true;
    }
}