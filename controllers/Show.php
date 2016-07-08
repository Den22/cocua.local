<?php
/**
 * Created by PhpStorm.
 * User: Den
 * Date: 08.07.2016
 * Time: 22:31
 */

namespace Application\Controllers;


class Show
{
    private function Show($path, $twig) {
        $template = $twig->loadTemplate($path . '.html');
        echo $template->render([]);
    }

    public function actionHome($twig) {
        $this->Show('home', $twig);
    }

    public function actionRules($twig) {
        $this->Show('rules', $twig);
    }

    public function actionAuthorization($twig) {
        $this->Show('authorization', $twig);
    }

    public function actionRegistration($twig) {
        $this->Show('registration', $twig);
    }

    public function actionClanlist($twig) {
        $this->Show('clanlist', $twig);
    }
}