<?php

require __DIR__ . '/autoload.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

//$template = $twig->loadTemplate('rules.html');
//$template = $twig->loadTemplate('clanlist.html');
$template = $twig->loadTemplate('blacklist.html');
echo $template->render([]);