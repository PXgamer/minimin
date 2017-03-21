<?php

namespace pxgamer\Minimin;

class Smarter
{
    public static $smarty;

    public static function get()
    {
        self::$smarty = new \Smarty;
        self::$smarty->setTemplateDir(SRC_PATH . '/Templates/');
        self::$smarty->setCompileDir(SRC_PATH . '/Templates_c/');
        return self::$smarty;
    }
}