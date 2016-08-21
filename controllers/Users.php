<?php

namespace Application\Controllers;

use Application\Classes\Files;
use Application\Models\Users as UsersModel;
use Application\Classes\View;
use Application\Classes\Validator;
use Application\Classes\Cookie;

class Users
{
    public function actionAll()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $users = UsersModel::findAll();
        UsersModel::convertBirthdayToAge($users);
        $view = new View();
        $view->data['users'] = $users;
        $view->data['cookie'] = $cookie;
        $view->display('clanlist');
    }

    public function actionOne($hashtag)
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $user = UsersModel::findByColumnClass('hashtag', '#' . $hashtag);
        $view = new View();
        $view->data['user'] = array_pop($user);
        $view->data['cookie'] = $cookie;
        $view->display('profile');
    }

    public function actionAddUser()
    {
        $valid = new Validator();
        $view = new View();
        if (!$valid->checkAll()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->display('registration');
            die;
        }
        $user = new UsersModel();
        $user->data = $valid->inputs;
        unset($user->data['code'], $user->data['password2'], $user->data['readRules']);
        $user->data['date'] = date("Y-m-d");
        if (!empty($_FILES['file']['name'])) {
            Files::AddAvatar();
            $user->data['avatarName'] = $_FILES['file']['name'];
        } else {
            $user->data['avatarName'] = 'avatar.jpg';
        }
        $user->insert();
        Cookie::set('hashtag', $user->data['hashtag']);
        header('Location: /users/one/' . trim($user->hashtag, '#'));
    }

    public function actionLogIn()
    {
        $valid = new Validator();
        $view = new View();
        if (!$valid->checkHashtagPassword()) {
            $view->data = 'error';
            $view->display('authorization');
            die;
        }
        Cookie::set('hashtag', $_POST['hashtag']);
        header('Location: /');
    }

    public function actionLogOut()
    {
        Cookie::delete('hashtag');
        header('Location: /');
    }

    public function actionAuthorization()
    {
        $cookie = Cookie::get('hashtag');
        if (!empty($cookie)) {
            header('Location: /');
        }
        $view = new View();
        $view->display('authorization');
    }

    public function actionRegistration()
    {
        $cookie = Cookie::get('hashtag');
        if (!empty($cookie)) {
            header('Location: /');
        }
        $view = new View();
        $view->display('registration');
    }
}