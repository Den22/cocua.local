<?php

namespace Application\Controllers;

use Application\Models\Users as UsersModel;
use Application\Classes\View;
use Application\Classes\Validator;
use Application\Classes\Cookie;

class Users
{
    public function actionAll()
    {
        $view = new View();
        $cookie = Cookie::get('hashtag');
        if(empty($cookie)) {
            $view->display('authorization');
            exit;
        }
        $users = UsersModel::findAll();
        UsersModel::convertToYears($users);
        $view->data['users'] = $users;
        $view->data['cookie'] = $cookie;
        $view->display('clanlist');
    }

    public function actionOne($hashtag)
    {
        $view = new View();
        $cookie = Cookie::get('hashtag');
        if(empty($cookie)) {
            $view->display('authorization');
            exit;
        }
        $user = UsersModel::findByColumn('hashtag', '#' . $hashtag);
        $view->data['user'] = array_pop($user);
        $view->data['cookie'] = $cookie;
        $view->display('profile');
    }

    public function actionAddUser()
    {
        $valid = new Validator();
        $view = new View();
        $inputs = filter_input_array(INPUT_POST, $valid->arrayFilters);
        if ($valid->checkAll($inputs) ||
            $valid->checkMatchPass($inputs) ||
            $valid->checkExistHashtag($inputs) ||
            $valid->checkCode($inputs)
        ) {
            $view->data = array_merge($valid->disparity, $inputs);
            $view->display('registration');
            die;
        }
        $user = new UsersModel();
        unset($inputs['code'], $inputs['password2'], $inputs['readRules']);
        $user->data = $inputs;
        $user->data['date'] = date("Y-m-d");
        $user->insert();
        Cookie::set('hashtag',$user->data['hashtag']);
        header('Location: /users/one/' . trim($user->hashtag, '#'));
    }

    public function actionAuthorization()
    {
        $valid = new Validator();
        $view = new View();
        if (!$valid->checkHashtagPassword()) {
            $view->data = 'error';
            $view->display('authorization');
            die;
        }
        Cookie::set('hashtag',$_POST['hashtag']);
        header('Location: /');
    }

    public function actionLogout()
    {
        Cookie::delete('hashtag');
        header('Location: /');
    }
}