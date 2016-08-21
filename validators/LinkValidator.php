<?php

namespace Application\Validators;


class LinkValidator extends AbstractValidator
{
    public $Filters = [
        'title' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,32}$/u']
        ],
        'link' => [
            'filter' => FILTER_VALIDATE_URL
        ]
    ];

    public $ErrorsMessage = [
        'title' => [
            'field' => '"Тема"',
            'prompt' => 'Должно быть от 3 до 32 символов'
        ],
        'link' => [
            'field' => '"Ссылка"',
            'prompt' => 'Неверный формат ссылки'
        ]
    ];
}