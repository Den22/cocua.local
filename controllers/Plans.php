<?php

namespace Application\Controllers;


use Application\Classes\Cookie;
use Application\Classes\Files;
use Application\Classes\View;
use Application\Models\Plans as PlansModel;
use Application\Models\Users;
use Application\Validators\PlanValidator;

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
        $valid = new PlanValidator();
        $view = new View();
        if ($valid->checkForm() || $valid->checkFile()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->data['cookie'] = Cookie::get('hashtag');
            $view->display('addPlan');
            die;
        }
        $plan = new PlansModel();
        $plan->data = $valid->inputs;
        Files::AddImage('plans');
        $plan->data['planName'] = $_FILES['file']['name'];
        $plan->data['authorHashtag'] = Cookie::get('hashtag');
        $user = Users::findByColumnArray('hashtag', $plan->data['authorHashtag']);
        $plan->data['author'] = $user['0']['nick'];
        $plan->insert();
        header('Location: /plans/all/' . $plan->data['townhole']);
    }
}
