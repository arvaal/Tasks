<?php

namespace controllers;

use core\Controller;
use lib\Pagination;

class HomeController extends Controller {

    public function indexAction() {

        $sort_url = DIR;
        if (isset($this->route['page'])) {
            $page = $this->route['page'];
            $sort_url .= 'page/' . $page;
        } else {
            $page = 1;
            $sort_url .= 'page/1';
        }

        if (isset($this->route['sort'])) {
            $exp = explode('_', $this->route['sort']);
            $sort = isset($exp[0]) ? $exp[0] : '';
            $order = isset($exp[1]) ? $exp[1] : '';
        } else {
            $sort = 'name';
            $order = 'asc';
        }

        $limit = 3;

        $total = $this->model->getTasksTotal();

        $data = [
            'sort' => $sort,
            'order' => $order,
            'start' => ($page - 1) * $limit,
            'limit' => $limit
        ];

        $result = $this->model->getTasks($data);

        $url = isset($this->route['sort']) ? '/sort/' . $sort . '_' . $order : '';

        $pagination = new Pagination();
        $pagination->total = $total;
        $pagination->page = $page;
        $pagination->limit = $limit;
        $pagination->text = '';
        $pagination->url = DIR . 'page/{page}' . $url;

        if ($order == 'asc') {
            $sort_order = 'desc';
        } else {
            $sort_order = 'asc';
        }


        $sorts = [
            'name' => $sort_url . '/sort/name_' . $sort_order,
            'email' => $sort_url . '/sort/email_' . $sort_order,
            'status' => $sort_url . '/sort/status_' . $sort_order,
        ];

        $texts = [
            'text_name' => 'Название задачи',
            'text_email' => 'Эл-почта',
            'text_text' => 'Текст',
            'text_status' => 'Статус',
            'text_action' => 'Действие',
            'btn_action' => 'Изменить',
            'btn_create' => 'Создать задачу',
            'text_yes' => 'В работе',
            'text_no' => 'Завершен',
        ];

        $links = [
            'edit_link' => DIR . 'admin/tasks/edit/',
            'create_link' => DIR . 'create/',
        ];

        $vars = [
            'sorts' => $sorts,
            'h1' => 'Список задач',
            'texts' => $texts,
            'links' => $links,
            'tasks' => $result,
            'pagination' => $pagination->render()
        ];

        $this->view->render($vars['h1'], $vars);
    }

}
