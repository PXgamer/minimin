<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Plugins;
use pxgamer\Minimin\Smarter;

class Main
{
    public $S;

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