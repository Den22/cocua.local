<?php

require __DIR__ . '/autoload.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);


$template = $twig->loadTemplate('authorization.html');
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
echo $template->render([]);