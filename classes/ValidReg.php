<?php

namespace Application\Classes;


class ValidReg extends Valid
{
    public $arrayFilters = [
        'code' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9]{6}$/']
        ],
        'hashtag' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\#[A-Za-z0-9]{9}$/']
        ],
        'nick'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,16}$/']
        ],
        'name'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,16}$/']
        ],
        'rank'=> [
            'filter' => FILTER_UNSAFE_RAW
        ],
        'city'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,16}$/']
        ],
        'occupation'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^.{3,32}$/']
        ],
        'password'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Zа-яА-Я0-9]{6,16}$/']
        ],
        'password2'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Zа-яА-Я0-9]{6,16}$/']
        ],
        'birthday'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(1|2)(9|0)\d\d\-(0|1)\d\-[0-3]\d$/']
        ],
        'phone'=> [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\+\d{2}\(\d{3}\)\d{7}$/']
        ],
        'email'=> [
            'filter' => FILTER_VALIDATE_EMAIL
        ],
        'readRules'=> [
            'filter' => FILTER_UNSAFE_RAW
        ]
    ];
    public $arrayNames = [
        'code' => [
            'field' => '"Код доступа"',
            'prompt' => 'Должен быть в формате "123456"'
            ],
        'hashtag' => [
            'field' => '"Ваш хештег в игре"',
            'prompt' => 'Должен быть в формате "#XXXXXXXXX"'
        ],
        'nick'=> [
            'field' => '"Ник в игре"',
            'prompt' => 'От 3 до 16 символов'
        ],
        'name'=> [
            'field' => '"Имя"',
            'prompt' => 'От 3 до 16 символов'
        ],
        'rank'=> [
            'field' => '"Звание"',
            'prompt' => ''
        ],
        'city'=> [
            'field' => '"Город"',
            'prompt' => 'От 3 до 16 символов'
        ],
        'occupation'=> [
            'field' => '"Род занятий"',
            'prompt' => 'От 3 до 32 символов'
        ],
        'password'=> [
            'field' => '"Пароль"',
            'prompt' => 'От 6 до 16 символов и включать в себя только буквенные или цифровые символы'
        ],
        'password2'=> [
            'field' => '"Повторите пароль"',
            'prompt' => 'От 6 до 16 символов и включать в себя только буквенные или цифровые символы'
        ],
        'birthday'=> [
            'field' => '"День рождения"',
            'prompt' => 'Должен быть в формате "ДД.ММ.РРРР"'
        ],
        'phone'=> [
            'field' => '"Номер мобильного телефона"',
            'prompt' => 'Должен быть в формате "+хх(ххх)ххххххх"'
        ],
        'email'=> [
            'field' => '"Электронная почта"',
            'prompt' => 'Неверный формат почты'
        ],
        'readRules'=> [
            'field' => '"Я прочитал правила"',
            'prompt' => 'Потвердите ознакомление с правилами клана'
        ]
    ];

}