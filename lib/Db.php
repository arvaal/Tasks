<?php

namespace lib;

use PDO;

class Db {

    protected $db;

    public function __construct() {
        $config = DB;
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=utf8', $config['user'], $config['password']);
    }

    public function query($sql, $params = []) {

        $stm = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stm->bindValue(':' . $key, $val);
            }
        }

        $stm->execute();

        return $stm;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);

        return $result->fetchColumn();
    }

    public function add($sql, $params = []): void {
        $this->query($sql, $params);
    }

}
