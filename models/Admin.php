<?php

namespace models;

use core\Model;

class Admin extends Model {
    
    public $error;


    public function loginValidate($post) {
        $config = ADMIN;
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            return false;
        }
        return true;
    }
    
    public function updateTasks($data = []): void {
        $this->db->query("UPDATE tasks SET name= :name, email= :email, text= :text, changed_text= :changed_text, status= :status WHERE id= :id", $data);
    }
    
}
