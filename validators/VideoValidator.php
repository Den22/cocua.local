<?php

namespace Application\Validators;


class VideoValidator extends AbstractValidator
{
    public $Filters = [
        'title' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,100}$/u']
        ],
        'townhole' => [
            'filter' => FILTER_UNSAFE_RAW
        ],
        'link' => [
            'filter' => FILTER_VALIDATE_URL
        ]
    ];

    public $ErrorsMessage = [
        'title' => [
            'field' => '"Тема"',
            'prompt' => 'Должно быть от 3 до 100 символов'
        ],
        'townhole' => [
            'field' => '"Уровень TH"',
            'prompt' => ''
        ],
        'link' => [
            'field' => '"Ссылка"',
            'prompt' => 'Неверный формат ссылки'
        ]
    ];
}