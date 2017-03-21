<?php

namespace pxgamer\Minimin;

use System\App;
use System\Request;
use System\Route;

/**
 * Class Minimin
 * @package pxgamer\Minimin
 */
class Minimin
{
    /**
     *
     */
    const APP_NAME = 'Minimin';

    /**
     * @var $this
     */
    public $controller;
    /**
     * @var $this
     */
    public $request;
    /**
     * @var $this
     */
    public $route;

    /**
     * Minimin constructor.
     */
    public function __construct()
    {
        if (!is_dir(SRC_PATH . 'data')) {
            mkdir(SRC_PATH . 'data');
        }

        $this->controller = App::instance();
        $this->request = Request::instance();
        $this->route = Route::instance($this->request);

        $this->route->any('/', [ROUTES . 'Main', 'index']);
        $this->route->group('/store', function () {
            $this->any('/', [ROUTES . 'Store', 'index']);
            $this->any('/search', [ROUTES . 'Store', 'search']);
        });

        $this->route->end();
    }
}