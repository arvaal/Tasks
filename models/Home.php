<?php

namespace models;

use core\Model;

class Home extends Model {

    public function getTasks($data = []) {
        $sql = 'SELECT * FROM tasks';
        $sort_data = array(
            'name',
            'email',
            'status'
        );
        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY name";
        }

        if (isset($data['order']) && ($data['order'] == 'desc')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }
        $sql .= ' LIMIT ' . (int) $data['start'] . ',' . (int) $data['limit'];
        $result = $this->db->row($sql);

        return $result;
    }
    
    public function getTask($data = []) {
        $sql = 'SELECT * FROM tasks WHERE id= :id';
        $result = $this->db->row($sql, $data);

        return $result[0];
    }

    public function getTasksTotal($data = []) {
        $result = $this->db->column("SELECT count(*) FROM tasks", $data);

        return $result;
    }
    
    public function addTasks($data = []): void {
        $this->db->add("INSERT INTO tasks (name, email, text) VALUES (:name, :email, :text)", $data);
    }

}
