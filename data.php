<?php
$show_complete_tasks = rand(0, 1);
$tasksCategories = [
    "Входящие",
    "Учеба",
    "Работа",
    "Домашние дела",
    "Авто"
];

$tasksList = [
    [
        'taskName' => 'Собеседование в IT компании',
        'taskCompleteDate' => '	01.12.2021',
        'taskCategory' => 'Работа',
        'taskCompleteStatus' => true,
    ],
    [
        'taskName' => 'Выполнить тестовое задание',
        'taskCompleteDate' => '25.12.2019',
        'taskCategory' => 'Работа',
        'taskCompleteStatus' => false,
    ],
    [
        'taskName' => 'Сделать задание первого раздела',
        'taskCompleteDate' => '21.12.2019',
        'taskCategory' => 'Учеба',
        'taskCompleteStatus' => false,
    ],
    [
        'taskName' => 'Встреча с другом',
        'taskCompleteDate' => '22.12.2019',
        'taskCategory' => 'Входящие',
        'taskCompleteStatus' => false,
    ],
    [
        'taskName' => 'Купить корм для кота',
        'taskCompleteDate' => null,
        'taskCategory' => 'Домашние дела',
        'taskCompleteStatus' => false,
    ],
    [
        'taskName' => 'Заказать пиццу',
        'taskCompleteDate' => null,
        'taskCategory' => 'Домашние дела',
        'taskCompleteStatus' => false,
    ]
];
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
