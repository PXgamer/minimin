<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Plugins;
use pxgamer\Minimin\Smarter;

/**
 * Class Main
 * @package pxgamer\Minimin\Routes
 */
class Main
{
    /**
     * @var \Smarty
     */
    public $S;

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->S = Smarter::get();
    }

    public function index()
    {
        $this->S->display(
            'index.tpl',
            [
                'plugins' => Plugins::get()
            ]
        );
    }
}