<?php

namespace models;

use core\Model;

class Admin extends Model {

    public function loginValidate($post) {
        $config = ADMIN;
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }
    
    public function updateTasks($data = []): void {
        $this->db->query("UPDATE tasks SET name= :name, email= :email, text= :text, status= :status WHERE id= :id", $data);
    }

}
