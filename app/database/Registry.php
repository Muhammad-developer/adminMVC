<?php

namespace app\database;

use PDO;
use PDOException;

error_reporting(E_ERROR | E_PARSE);

class Registry
{
    public array $config = [
        'host' => 'localhost',
        'name' => 'mvc',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf-8',
    ];
    public PDO $db;

    public function __construct()
    {
        try {
            // подключаемся к серверу
            $this->db = new PDO ('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['name'], $this->config['user'], $this->config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }

    public function Sql($query): bool|array
    {
        $out = $this->db;
        $res = $out->query($query);
        return $res->fetchAll();
    }
}