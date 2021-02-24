<?php

namespace core;

class Menu {

    public function menu() {
        $menu = [
            'logo' => [
                'text' => 'Tasks',
                'href' => DIR
            ],
            'menu' => [
                [
                    'text' => 'Список задач',
                    'href' => DIR,
                ],
                [
                    'text' => 'Создать задачу',
                    'href' => DIR . 'create',
                ],
                [
                    'text' => 'Администратор',
                    'href' => DIR . 'admin/tasks',
                ]
            ]
        ];

        return $menu;
    }

}
