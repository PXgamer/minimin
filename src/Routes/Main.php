<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Plugins;
use pxgamer\Minimin\Smarter;

/**
 * Class Main.
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
                'plugins' => Plugins::get(),
            ]
        );
    }

    /**
     * @param int    $error_code
     * @param string $error_text
     */
    public function error($error_code = 200, $error_text = 'An unknown error occurred')
    {
        $this->S->display(
            'error.tpl',
            [
                'error_code' => $error_code,
                'error_text' => $error_text,
            ]
        );
    }
}
