<?php

namespace app\Controller;

use app\database\Registry;

class PostController extends Registry
{

    public function SelectAllWhere($table, $where = null)
    {
        $out = $this->db->query("SELECT * FROM $table WHERE $where")->fetchAll();
        if (!empty($out)) {
            return $out;
        } else {
            echo "Запрашиваемая запрос не найдено или задано не верно!";
        }
    }
}