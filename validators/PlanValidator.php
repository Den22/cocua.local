<?php

namespace Application\Validators;


class PlanValidator extends AbstractValidator
{

    public $Filters = [
        'description' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^\X{3,80}$/u']
        ],
        'townhole' => [
            'filter' => FILTER_UNSAFE_RAW
        ]
    ];

    public $ErrorsMessage = [
        'description' => [
            'field' => '"Описание"',
            'prompt' => 'Должно быть от 3 до 80 символов'
        ],
        'townhole' => [
            'field' => '"Уровень TH"',
            'prompt' => ''
        ]
    ];

    public function checkFile()
    {
        if (empty($_FILES['file']['name'])) {
            $this->disparity = [
                'field' => '"Файл"',
                'prompt' => 'Не выбрано ни одного файла'
            ];
            return true;
        }
        return false;
    }
}