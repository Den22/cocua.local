<?php

require __DIR__ . '/autoload.php';
require __DIR__ . '/config.php';

use Application\Classes\Route;

try {
    Route::run();
} catch (\Exception $e) {
    echo $e->getMessage();
}