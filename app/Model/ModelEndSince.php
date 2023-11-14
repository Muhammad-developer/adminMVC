<?php

namespace app\Model;

use app\database\Registry;

class ModelEndSince extends Registry
{
    function endSince(): bool|array
    {
        $ses_id = session_id();
        return $this->Sql("UPDATE `actives` SET `end_time`= CURRENT_TIMESTAMP WHERE end_time = 'Активно' AND ses_id = '$ses_id'");
    }
}