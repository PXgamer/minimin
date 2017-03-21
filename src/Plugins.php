<?php

namespace pxgamer\Minimin;

/**
 * Class Plugins
 * @package pxgamer\Minimin
 */
class Plugins
{
    /**
     * @var string
     */
    private static $json_path = SRC_PATH . 'data' . DS . 'plugins.json';

    /**
     * @return array|mixed
     */
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

    /**
     * @param string $vendor
     * @param string $plugin_name
     * @return bool
     */
    public static function install($vendor, $plugin_name)
    {
        if ($plugin_name == '' || !is_string($plugin_name)) {
            return false;
        }

        $response = exec('cd "' . ROOT_PATH . '" && composer require ' . $vendor . '/' . $plugin_name);

        if (!$response) {
            return false;
        }

        $plugins = json_decode(file_get_contents(self::$json_path));
        $pluginsInfo = Plugins::getPluginInfo($vendor, $plugin_name);
        if (!empty($pluginsInfo)) {
            $plugins[] = $pluginsInfo;
            file_put_contents(self::$json_path, json_encode($plugins));
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $vendor
     * @param string $plugin_name
     * @return array
     */
    private static function getPluginInfo($vendor = '', $plugin_name = '')
    {
        if (class_exists($vendor . '\\' . $plugin_name . '\\Plugin')) {
            return ($vendor . '\\' . $plugin_name . '\\Plugin')::info();
        } else {
            return [];
        }
    }
}