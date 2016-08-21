<?php

namespace Application\Controllers;

use Application\classes\Convert;
use Application\Classes\Files;
use Application\Models\Users as UsersModel;
use Application\Classes\View;
use Application\Classes\Cookie;
use Application\Validators\UserValidator;

class Users
{
    public function actionAll()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $users = UsersModel::findAll();
        Convert::birthdayToAge($users);
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
        $valid = new UserValidator();
        $view = new View();
        if ($valid->checkForm() || $valid->extraChecks()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->display('registration');
            die;
        }
        $user = new UsersModel();
        unset($valid->inputs['code'], $valid->inputs['password2'], $valid->inputs['readRules']);
        $user->data = $valid->inputs;
        $user->data['date'] = date("Y-m-d");
        if (!empty($_FILES['file']['name'])) {
            Files::AddImage('users');
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
        $valid = new UserValidator();
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