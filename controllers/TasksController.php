<?php

namespace controllers;

use core\Controller;

class TasksController extends Controller {

    public function createAction() {

        $texts = [
            'text_name' => 'Название задачи',
            'text_email' => 'Эл-почта',
            'text_text' => 'Текст',
            'text_yes' => 'В работу',
            'text_no' => 'Завершить',
            'text_save' => 'Сохранить',
            'text_cancel' => 'Отменить',
        ];

        $links = [
            'action' => DIR . '/save',
            'cancel_link' => DIR . '/'
        ];

        $vars = [
            'h1' => 'Создать задачу',
            'texts' => $texts,
            'links' => $links
        ];

        $this->view->render($vars['h1'], $vars);
    }

    public function saveAction() {

        $this->view->path = 'tasks/success';

        $links = [
            'home_link' => DIR . '/'
        ];

        $texts = [
            'text_name' => 'Название задачи',
            'text_email' => 'Эл-почта',
            'text_text' => 'Текст',
            'text_yes' => 'В работу',
            'text_no' => 'Завершить',
            'text_save' => 'Сохранить',
            'text_home' => 'На главную',
        ];

        $vars = [
            'h1' => 'Задача сохранена',
            'texts' => $texts,
            'links' => $links
        ];


        if ($this->clean->server['REQUEST_METHOD'] == 'POST') {
            if ($this->clean->post['name'] && $this->clean->post['email'] && $this->clean->post['text']) {
                $this->model->addTasks($this->clean->post);
                $this->view->redirect(DIR . '/save');
            }
        }

        $this->view->render($vars['h1'], $vars);
    }

}
