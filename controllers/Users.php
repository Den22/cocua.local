<?php

namespace Application\Controllers;

use Application\Models\Users as UsersModel;
use Application\Classes\View;


class Users
{
    public function actionAll()
    {
        $view = new View();
        $view->data = UsersModel::findAll();
        $view->display('clanlist');
    }

    public function actionOne($id)
    {
        $view = new View();
        $view->data = UsersModel::findOneByPk($id);
        $view->display('profile');
    }

    public function actionAddUser()
    {
        $user = new UsersModel();
        $args = [
            'code' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9]{6}$/']
            ],
            'hashtag' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^\#[A-Za-z0-9]{9}$/']
            ],
            'nick'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'name'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'rank'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'city'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'occupation'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'password'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'password2'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'birthday'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'phone'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ],
            'readRules'=> [
                'filter' => FILTER_VALIDATE_REGEXP,
                'flags' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^.{3,12}$/']
            ]
        ];
        $myinputs = filter_input_array(INPUT_POST, $args);

        var_dump($myinputs);die;

        $user->data = $_POST;
        unset($user->data['password2']);
        unset($user->data['readRules']);
        unset($user->data['code']);
        $user->data['date'] = date("Y-m-d");
        $user->insert();
        header('Location: /users/one/' . $user->id);
    }
}