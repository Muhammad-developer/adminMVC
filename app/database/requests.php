<?php

//namespace Request;
//
//
////use DataBase;
//use DataBase\DataBase;
//use PDO;
namespace app\database;
use MVC\app\View\database\PDO;
use DataBase;
use Registry;

class News extends DataBase
{
    public $table = 'ge'; //Главная таблица
    public $id_row = 'id'; // primary key

    public function __construct()
    {
        $registry = new Registry(); //параметры подключения к базе данных
        $this->db = parent::getInstance($registry);
    }

    // для доступа к классу через статический метод
    public static function getObject()
    {
        return new News();
    }

    // получаем записи из таблицы.
    public function getRecords($what = array('*'), $where = NULL, $limit = NULL, $order = NULL, $join = NULL, $debug = false)
    {
        $data = $this->prepareSelectSQL($what, $where, $limit, $order, $join, $debug);
        $res = $this->db->prepare($data['sql']);
        $res->execute($data['params']);
        $result = $res->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

    public function addRecord($data = array(), $debug = false)
    {
        $data = $this->prepareInsertSQL($data, $this->table, $debug);
        $query = $this->db->prepare($data['sql']);
        return $query->execute($data['params']);
    }

    public function deleteRecords($table, $where = NULL, $debug = false)
    {
        $data = $this->prepareDeleteSQL($table, $where, $debug);
        $query = $this->db->prepare($data['sql']);
        $result = $query->execute($data['params']);
        return $result;
    }

    public function setRecords($table, $what, $where, $debug = false)
    {
        $data = $this->prepareUpdateSQL($table, $what, $where, $debug);
        $query = $this->db->prepare($data['sql']);
        $result = $query->execute($data['params']);
        return $result;
    }

    public function query($sql)
    {
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}

?>