<?php

namespace models;

use core\Model;

class Tasks extends Model {

    public function addTasks($data = []): void {
        $this->db->add("INSERT INTO tasks (name, email, text) VALUES (:name, :email, :text)", $data);
    }

}
