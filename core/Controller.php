<?php

namespace core;

use core\View;
use lib\Clean;

abstract class Controller {

    public $route;
    public $view;
    public $clean;

    public function __construct($route) {

        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        $this->clean = new Clean();
    }

    public function loadModel($name) {
        $path = 'models\\' . ucfirst($name);

        if (class_exists($path)) {
            return new $path;
        }
    }

}
