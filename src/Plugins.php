<?php

namespace pxgamer\Minimin;

class Plugins
{
    private static $json_path = SRC_PATH . 'data' . DS . 'plugins.json';

    public static function get()
    {
        if (file_exists(self::$json_path)) {
            $plugins = json_decode(file_get_contents(self::$json_path));
        } else {
            $plugins = [];
            file_put_contents(self::$json_path, json_encode($plugins));
        }

        return $plugins;
    }
}