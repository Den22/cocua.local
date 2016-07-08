<?php

require __DIR__ . '/autoload.php';
require __DIR__ . '/config.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', trim($request, ' /'));

$ctrl = !empty($parts['0']) ? ucfirst($parts['0']) : 'Show';
$act = !empty($parts['1']) ? ucfirst($parts['1']) : 'Home';
$var1 = !empty($parts['2']) ? ($parts['2']) : null;
$var2 = !empty($parts['3']) ? ($parts['3']) : null;

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$ClassName = 'Application\\Controllers\\' . $ctrl;
$method = 'action' . $act;
$controller = new $ClassName;
$controller->$method($twig, $var1, $var2);

//$template = $twig->loadTemplate('base.html');
//$template = $twig->loadTemplate('authorization.html');
//$template = $twig->loadTemplate('registration.html');
//$template = $twig->loadTemplate('rules.html');
//$template = $twig->loadTemplate('clanlist.html');
//$template = $twig->loadTemplate('blacklist.html');
//$template = $twig->loadTemplate('topics.html');
//$template = $twig->loadTemplate('one_topic.html');
//$template = $twig->loadTemplate('plans.html');
//$template = $twig->loadTemplate('video.html');
//$template = $twig->loadTemplate('links.html');
//$template = $twig->loadTemplate('profile.html');
//echo $template->render([]);