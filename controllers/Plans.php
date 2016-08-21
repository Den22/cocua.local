<?php

namespace Application\controllers;


use Application\Classes\Cookie;
use Application\Classes\Files;
use Application\Classes\Validator;
use Application\Classes\View;
use Application\Models\Plans as PlansModel;
use Application\Models\Users;

class Plans
{
    public function actionAll($th)
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $plans = PlansModel::findByColumnClass('townhole', $th);
        $view = new View();
        $view->data['plans'] = $plans;
        $view->data['cookie'] = $cookie;
        $view->data['townhole'] = substr($th, 0, -2);
        $view->display('plans');
    }

    public function actionAdd()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $view = new View();
        $view->data['cookie'] = $cookie;
        $view->display('addPlan');
    }

    public function actionAddPlan()
    {
        $valid = new Validator();
        $view = new View();
        if (!$valid->checkPlan()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->data['cookie'] = Cookie::get('hashtag');
            $view->display('addPlan');
            die;
        }
        $plan = new PlansModel();
        $plan->data = $valid->inputs;
        if (!empty($_FILES['file']['name'])) {
            Files::AddPlan();
            $plan->data['planName'] = $_FILES['file']['name'];
        } else {
            $view->data = $plan->data;
            $view->data['error'] = [
                'field' => '"Файл"',
                'prompt' => 'Не выбрано ни одного файла'
            ];
            $view->data['cookie'] = Cookie::get('hashtag');
            $view->display('addPlan');
            die;
        }
        $plan->data['authorHashtag'] = Cookie::get('hashtag');
        $name = Users::findByColumnArray('hashtag', $plan->data['authorHashtag']);
        $plan->data['author'] = array_pop($name);
        $plan->insert();
        header('Location: /plans/all/' . $plan->data['townhole']);
    }
}
