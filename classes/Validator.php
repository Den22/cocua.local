<?php

namespace Application\Classes;

use Application\Models\Users;
use Application\Models\Codes;


class Validator
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
        'nick' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,16}$/']
        ],
        'name' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,16}$/']
        ],
        'rank' => [
            'filter' => FILTER_UNSAFE_RAW
        ],
        'city' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,16}$/u']
        ],
        'occupation' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,32}$/u']
        ],
        'password' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Zа-яА-Я0-9]{6,16}$/']
        ],
        'password2' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-zA-Zа-яА-Я0-9]{6,16}$/']
        ],
        'birthday' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(1|2)(9|0)\d\d\-(0|1)\d\-[0-3]\d$/']
        ],
        'phone' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\+\d{2}\(\d{3}\)\d{7}$/']
        ],
        'email' => [
            'filter' => FILTER_VALIDATE_EMAIL
        ],
        'readRules' => [
            'filter' => FILTER_UNSAFE_RAW
        ]
    ];
    public $arrayNames = [
        'code' => [
            'field' => '"Код доступа"',
            'prompt' => 'Должно быть в формате "123456"'
        ],
        'hashtag' => [
            'field' => '"Ваш хештег в игре"',
            'prompt' => 'Должно быть в формате "#XXXXXXXXX"'
        ],
        'nick' => [
            'field' => '"Ник в игре"',
            'prompt' => 'Должно быть от 3 до 16 символов'
        ],
        'name' => [
            'field' => '"Имя"',
            'prompt' => 'Должно быть от 3 до 16 символов'
        ],
        'rank' => [
            'field' => '"Звание"',
            'prompt' => ''
        ],
        'city' => [
            'field' => '"Город"',
            'prompt' => 'Должно быть от 3 до 16 символов'
        ],
        'occupation' => [
            'field' => '"Род занятий"',
            'prompt' => 'Должно быть от 3 до 32 символов'
        ],
        'password' => [
            'field' => '"Пароль"',
            'prompt' => 'Должно быть от 3 до 16 символов и включать в себя только буквенные или цифровые символы'
        ],
        'password2' => [
            'field' => '"Подвердите пароль"',
            'prompt' => 'Должно быть от 3 до 16 символов и включать в себя только буквенные или цифровые символы'
        ],
        'birthday' => [
            'field' => '"День рождения"',
            'prompt' => 'Должено быть в формате "ДД.ММ.РРРР"'
        ],
        'phone' => [
            'field' => '"Номер мобильного телефона"',
            'prompt' => 'Должено быть в формате "+хх(ххх)ххххххх"'
        ],
        'email' => [
            'field' => '"Электронная почта"',
            'prompt' => 'Неверный формат почты'
        ],
        'readRules' => [
            'field' => '"Я прочитал правила"',
            'prompt' => 'Потвердите ознакомление с правилами клана'
        ]
    ];

    public $disparity;

    public function checkAll($inputs)
    {
        foreach ($inputs as $key => $input) {
            if (empty($input) || $input === false) {
                $this->disparity = $this->arrayNames[$key];
                return true;
            }
        }
        return false;
    }

    public function checkMatchPass($inputs)
    {
        if ($inputs['password'] !== $inputs['password2']) {
            $this->disparity = [
                'field' => '"Пароль"',
                'prompt' => 'Поля "Пароль" и "Подвердите пароль" не совпадают'
            ];
            return true;
        }
        return false;
    }

    public function checkCode($inputs)
    {
        $code = new Codes();
        $res = $code->findByColumnArray('hashtag', $inputs['hashtag']);
        $pair = array_pop($res);
        if (empty($pair) || $pair['code'] !== $inputs['code']) {
            $this->disparity = [
                'field' => '"Код доступа"',
                'prompt' => 'Неверный код доступа'
            ];
            return true;
        }
        $code->deleteByColumn('hashtag', $pair['hashtag']);
        return false;
    }

    public function checkExistHashtag($inputs)
    {
        $user = new Users();
        if ($user->findByColumn('hashtag', $inputs['hashtag'])) {
            $this->disparity = [
                'field' => '"Ваш хештег в игре"',
                'prompt' => 'Данный хештег зарегистрирован за другим пользователем.
                 Если все же это ваш хештег - свяжитесь с главой клана в чате или через email d080590@gmail.com'
            ];
            return true;
        }
        return false;
    }

    public function checkHashtagPassword()
    {
        if (empty($_POST['hashtag']) || empty($_POST['password'])) {
            return false;
        }
        $hashtags = Users::getHashtagPasswordList();
        foreach ($hashtags as $hashtag) {
            if (in_array($_POST['hashtag'], $hashtag)) {
                if ($hashtag['password'] == $_POST['password']) {
                    return true;
                }
            }
        }
        return false;
    }
}