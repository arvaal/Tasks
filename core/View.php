<?php

namespace core;

use core\Menu;

class View {

    public $path;
    public $html = 'default';
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = []) {

        $menu = new Menu();
        $menu = $menu->menu();

        extract($vars);

        $path = 'views/' . $this->path . '.tpl';

        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'views/html/' . $this->html . '.tpl';
        } else {
            self::errorCode(404);
        }
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'views/errors/' . $code . '.tpl';
        ;
        require $path;
        exit;
    }

    public function redirect($url) {
        header('location: ' . $url);
        exit;
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url) {
        exit(json_encode(['url' => $url]));
    }

}
