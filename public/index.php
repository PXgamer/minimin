<?php

use pxgamer\Minimin\Minimin;

include __DIR__.'/../vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR, true);
define('ROOT_PATH', realpath('..'), true);
define('BASE_PATH', ROOT_PATH.DS.'public'.DS, true);
define('SRC_PATH', ROOT_PATH.DS.'src'.DS, true);
define('ROUTES', '\\pxgamer\\Minimin\\Routes\\');

new Minimin();