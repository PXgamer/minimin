<?php

namespace pxgamer\Minimin;

/**
 * Class Smarter
 * @package pxgamer\Minimin
 */
class Smarter
{
    /**
     * @var \Smarty
     */
    public static $smarty;

    /**
     * @return \Smarty
     */
    public static function get()
    {
        if (!isset(self::$smarty)) {
            self::$smarty = new \Smarty;
        }
        self::$smarty->setTemplateDir(SRC_PATH . '/Templates/');
        self::$smarty->setCompileDir(SRC_PATH . '/Templates_c/');
        return self::$smarty;
    }
}