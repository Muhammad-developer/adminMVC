<?php

namespace app\Model;

use app\database\Registry;

class ModelActiveUser extends Registry
{
    public function activeUser(): bool|array
    {
        $ses_id = session_id();
        return $this->Sql("SELECT * FROM `actives` JOIN active_user ON actives.id_user = active_user.id_user JOIN users ON active_user.id_user = users.id JOIN role ON users.role_id = role.id WHERE end_time = 'Активно' AND ses_id = '$ses_id'");
    }
}