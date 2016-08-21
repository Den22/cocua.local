<?php

namespace Application\controllers;

use Application\Classes\Cookie;
use Application\Classes\Validator;
use Application\Classes\View;
use Application\Models\Links as LinksModel;


class Links
{
    public function actionShow()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $links = LinksModel::findAll();
        $view = new View();
        $view->data['links'] = $links;
        $view->data['cookie'] = $cookie;
        $view->display('links');
    }

    public function actionAdd()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $view = new View();
        $view->data['cookie'] = $cookie;
        $view->display('addLink');
    }

    public function actionAddLink()
    {
        $valid = new Validator();
        $view = new View();
        if (!$valid->checkLink()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->data['cookie'] = Cookie::get('hashtag');
            $view->display('addLink');
            die;
        }
        $link = new LinksModel();
        $link->data = $valid->inputs;
        $link->data['authorHashtag'] = Cookie::get('hashtag');
        $link->insert();
        header('Location: /links');
    }
}

