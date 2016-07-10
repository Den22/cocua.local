<?php

namespace Application\Controllers;

use Application\Models\Users;


class Admin
{
    public function actionAddUser()
    {
        $user = new Users();
        $user->data = $_POST;
        unset($user->data['password2']);
        unset($user->data['readRules']);
        unset($user->data['code']);
        $user->data['date'] = date("Y-m-d");
        $user->insert();
        header('Location: /users/one/' . $user->id);
    }
}