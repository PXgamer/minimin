<?php

namespace pxgamer\Minimin;

class Smarter
{
    public $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty;
        $this->smarty->setTemplateDir(SRC_PATH . '/Templates/');
        $this->smarty->setCompileDir(SRC_PATH . '/Templates_c/');
    }

    public function get()
    {
        return $this->smarty;
    }
}