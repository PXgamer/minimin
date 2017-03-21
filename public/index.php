<?php

use pxgamer\Minimin\Minimin;

include '../vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, true);
define('ROUTES', '\\pxgamer\\Minimin\\Routes\\');

new Minimin();