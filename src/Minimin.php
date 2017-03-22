<?php

namespace pxgamer\Minimin;

use pxgamer\Minimin\Routes\Store;
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
            $this->any('/install/{vendor}/{package}', function ($vendor, $package) {
                (new Store)->install($vendor, $package);
            });
            $this->any('/uninstall/{vendor}/{package}', function ($vendor, $package) {
                (new Store)->uninstall($vendor, $package);
            });
            $this->any('/update', [ROUTES . 'Store', 'update']);
        });
        $this->route->group('/options', function () {
            $this->any('/', [ROUTES . 'Options', 'index']);
        });
        $this->route->any(['/{plugin}', '/(.*)'], function ($plugin) {
            $namespace = Plugins::search($plugin);
            $AppClass = $namespace . '\\App';

            if (class_exists($AppClass)) {
                Smarter::get()->display(
                    'package.tpl',
                    [
                        'AppClass' => $AppClass,
                        'Route' => $this
                    ]
                );
            } else {
                $Main = new Routes\Main;
                $Main->error(404, 'Oops, page not found.');
            }
        });

        $this->route->end();
    }
}