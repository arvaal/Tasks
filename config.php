<?php

define('ADMIN', [
    'login' => 'admin',
    'password' => '123',
]);

define("ROUTES", [
    '' => [
        'controller' => 'home',
        'action' => 'index'
    ],
    'create' => [
        'controller' => 'home',
        'action' => 'create'
    ],
    'save' => [
        'controller' => 'home',
        'action' => 'save'
    ],
    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login'
    ],
    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout'
    ],
    'admin/tasks' => [
        'controller' => 'admin',
        'action' => 'tasks'
    ],
    'admin/tasks/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit'
    ],
    'admin/tasks/save' => [
        'controller' => 'admin',
        'action' => 'save'
    ],
    'admin/tasks/page/{page:\d+}' => [
        'controller' => 'admin',
        'action' => 'tasks'
    ],
    'admin/tasks/sort/{sort:\w+}' => [
        'controller' => 'home',
        'action' => 'index',
    ],
    'admin/tasks/page/{page:\d+}/sort/{sort:\w+}' => [
        'controller' => 'admin',
        'action' => 'tasks',
    ],
    'page/{page:\d+}' => [
        'controller' => 'home',
        'action' => 'index'
    ],
    'sort/{sort:\w+}' => [
        'controller' => 'home',
        'action' => 'index',
    ],
    'page/{page:\d+}/sort/{sort:\w+}' => [
        'controller' => 'home',
        'action' => 'index',
    ]
]);

define('DIR', '/Tasks');

define("DB", [
    'host' => 'localhost',
    'name' => 'tasks',
    'user' => 'root',
    'password' => '88442244'
]);

