<?php

namespace controllers;

use core\Controller;
use lib\Pagination;
use models\Home;

class AdminController extends Controller {

    public function loginAction() {

        $texts = [
            'text_login' => 'Логин',
            'text_password' => 'Пароль',
            'text_send' => 'Войти',
        ];

        $links = [
            'action' => DIR . '/admin/login'
        ];

        $vars = [
            'h1' => 'Вход',
            'texts' => $texts,
            'links' => $links
        ];

        $vars['success'] = [];

        if (isset($_SESSION['success'])) {
            $vars['success'] = $_SESSION['success'];

            unset($_SESSION['success']);
        } else {
            $vars['success'] = '';
        }

        $vars['errors'] = [];

        if (isset($_SESSION['admin'])) {
            $this->view->redirect(DIR . '/admin/tasks');
        }

        if (!empty($this->clean->post)) {

            if (!$this->model->loginValidate($this->clean->post)) {
                $vars['errors'][] = 'Логин или пароль указан неверно';
                $this->view->render($vars['h1'], $vars);
                exit();
            }

            $_SESSION['admin'] = true;
            $_SESSION['success'] = 'Вы вошли как адмнистратор';
            $this->view->redirect(DIR . '/admin/tasks');
        }

        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            $this->view->redirect(DIR . '/admin/tasks');
        }

        $this->view->render($vars['h1'], $vars);
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect(DIR . '/admin/tasks');
    }

    public function tasksAction() {
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {

            $model = new Home();

            $sort_url = DIR;
            if (isset($this->route['page'])) {
                $page = $this->route['page'];
                $sort_url .= '/admin/tasks/page/' . $page;
            } else {
                $page = 1;
                $sort_url .= '/admin/tasks/page/1';
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

            $total = $model->getTasksTotal();

            $data = [
                'sort' => $sort,
                'order' => $order,
                'start' => ($page - 1) * $limit,
                'limit' => $limit
            ];

            $result = $model->getTasks($data);

            $url = isset($this->route['sort']) ? '/sort/' . $sort . '_' . $order : '';

            $pagination = new Pagination();
            $pagination->total = $total;
            $pagination->page = $page;
            $pagination->limit = $limit;
            $pagination->text = '';
            $pagination->url = DIR . '/admin/tasks/page/{page}' . $url;

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
                'text_no' => 'Выполнено',
                'text_changed' => 'Отредактировано администратором',
                'text_login' => 'Войти как администратор',
                'text_logout' => 'Выход'
            ];

            $links = [
                'edit_link' => DIR . '/admin/tasks/edit/',
                'create_link' => DIR . '/create/',
                'login_link' => DIR . '/admin/login',
                'logout_link' => DIR . '/admin/logout'
            ];

            $vars = [
                'sorts' => $sorts,
                'h1' => 'Список задач',
                'tasks' => $result,
                'texts' => $texts,
                'links' => $links,
                'pagination' => $pagination->render(),
                'is_admin' => isset($_SESSION['admin']) ? $_SESSION['admin'] : false
            ];

            if (isset($_SESSION['success'])) {
                $vars['success'] = $_SESSION['success'];

                unset($_SESSION['success']);
            } else {
                $vars['success'] = '';
            }

            $this->view->render($vars['h1'], $vars);
        } else {
            $this->view->redirect(DIR . '/admin/login');
        }
    }

    public function editAction() {
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {

            $model = new Home();

            $data = [
                'id' => $this->route['id']
            ];

            $result = $model->getTask($data);

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
                'action' => DIR . '/admin/tasks/save',
                'home_link' => DIR . '/admin/tasks',
                'cancel_link' => DIR . '/admin/tasks'
            ];

            $vars = [
                'h1' => 'Редактирование задачи',
                'task' => $result,
                'texts' => $texts,
                'links' => $links
            ];

            $this->view->render($vars['h1'], $vars);
        } else {
            $this->view->redirect(DIR . '/admin/login');
        }
    }

    public function saveAction() {
        
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            
            $texts = [
                'text_home' => 'На главную'
            ];

            $links = [
                'home_link' => DIR . '/admin/tasks'
            ];

            $vars = [
                'h1' => 'Задача сохранена',
                'links' => $links,
                'texts' => $texts
            ];

            $vars['errors'] = [];

            if ($this->clean->server['REQUEST_METHOD'] == 'POST') {

                $post = $this->clean->post;

                if ($post['text'] !== $post['do_chang_text']) {
                    $post['changed_text'] = 1;
                }

                unset($post['do_chang_text']);

                if ($post['name'] && $post['email'] && $post['text'] && $post['status'] >= 0) {
                    $this->model->updateTasks($post);
                    $_SESSION['success'] = 'Задача успешно изменина';
                    $this->view->redirect(DIR . '/admin/tasks');
                }
            }

            $this->view->render($vars['h1'], $vars);
        } else {
            $this->view->redirect(DIR . '/admin/login');
        }
    }

}
