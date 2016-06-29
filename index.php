<?php

require __DIR__ . '/autoload.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$template = $twig->loadTemplate('index.html');
$title = 'Название страницы';
$text = 'Hello, world!!!';
$class = 'success';
echo $template->render([
    'title' => $title,
    'text' => $text,
    'class' => $class
]);