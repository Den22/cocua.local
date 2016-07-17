<?php

namespace Application\Classes;


class View
{
    public $data = [];
    private $twig;

    public function __construct()
    {
        \Twig_Autoloader::register();
        $loader = new \Twig_Loader_Filesystem('templates');
        $this->twig = new \Twig_Environment($loader);
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function display($path) {
        $template = $this->twig->loadTemplate($path . '.html');
        echo $template->render(['data' => $this->data]);
    }
}