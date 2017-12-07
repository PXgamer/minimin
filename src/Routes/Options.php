<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Plugins;
use pxgamer\Minimin\Smarter;

/**
 * Class Options.
 */
class Options
{
    /**
     * @var \Smarty
     */
    public $S;

    /**
     * Options constructor.
     */
    public function __construct()
    {
        $this->S = Smarter::get();
    }

    public function index()
    {
        $this->S->display(
            'options/index.tpl',
            [
                'plugins' => Plugins::get(),
            ]
        );
    }
}
