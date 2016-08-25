<?php

namespace Application\Controllers;

use Application\classes\Convert;
use Application\Classes\Cookie;
use Application\Classes\View;
use Application\Models\Videos as VideosModel;
use Application\Validators\VideoValidator;
use Application\Models\Users;

class Videos
{
    public function actionAll($th)
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $videos = VideosModel::findByColumnClass('townhole', $th);
        $view = new View();
        $view->data['videos'] = $videos;
        $view->data['cookie'] = $cookie;
        $view->data['townhole'] = substr($th, 0, -2);
        $view->display('videos');
    }

    public function actionAdd()
    {
        $cookie = Cookie::get('hashtag');
        if (empty($cookie)) {
            header("Location: /users/authorization");
        }
        $view = new View();
        $view->data['cookie'] = $cookie;
        $view->display('addVideo');
    }

    public function actionAddVideo()
    {
        $valid = new VideoValidator();
        $view = new View();
        if ($valid->checkForm()) {
            $view->data = $valid->inputs;
            $view->data['error'] = $valid->disparity;
            $view->data['cookie'] = Cookie::get('hashtag');
            $view->display('addVideo');
            die;
        }
        $video = new VideosModel();
        $video->data = $valid->inputs;
        $video->data['link'] = Convert::linkToIframe($video->data['link']);
        $video->data['authorHashtag'] = Cookie::get('hashtag');
        $user = Users::findByColumnArray('hashtag', $video->data['authorHashtag']);
        $video->data['author'] = $user['0']['nick'];
        $video->insert();
        header('Location: /videos/all/' . $video->data['townhole']);
    }
}