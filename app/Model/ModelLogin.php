<?php

namespace app\Model;
error_reporting(E_ERROR | E_PARSE);

use app\database\Registry;

class ModelLogin extends Registry
{
    public mixed $logout;
    public mixed $password;
    public mixed $login;

    function __construct()
    {
        parent::__construct();
        error_reporting(E_ERROR | E_PARSE);
        $this->login = $_POST['login'];
        $this->password = md5($_POST['password']);
        $this->logout = $_POST['logout'];
    }

    public function fetchLogin(): bool|array
    {
        session_start();
        if (isset($this->logout)) {
            $this->Sql("INSERT INTO `actives` (`id_user`, `name`) SELECT users.id, users.fullName FROM users WHERE users.login = '$this->login'");
            $this->Sql("UPDATE `actives` SET actives.ses_id = '" . session_id() . "' ORDER BY id DESC LIMIT 1");
            return $this->Sql("SELECT * FROM  users JOIN role ON users.role_id = role.id WHERE login = '$this->login' AND PASSWORD = '$this->password'");
        } else {
            return $message = 'Error login or password';
        }
    }
}