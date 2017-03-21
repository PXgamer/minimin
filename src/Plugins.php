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
     * @param string $plugin_path
     * @param string|null $type
     * @return bool
     */
    public static function search($plugin_path, $type = null)
    {
        if (is_null($type)) {
            $type = 'link';
        }

        foreach (self::get() as $item) {
            if ($plugin_path == $item->{$type}) {
                return $item->app_namespace;
            }
        }
        return false;
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

        if (self::search($vendor . '/' . $plugin_name, 'package_name')) {
            exec('cd "' . ROOT_PATH . '" && composer require ' . $vendor . '/' . $plugin_name);
        }

        $plugins = json_decode(file_get_contents(self::$json_path));
        $pluginsInfo = Plugins::getPluginInfo($vendor, $plugin_name);
        if (!empty($pluginsInfo)) {
            $pluginsInfo['package_name'] = $vendor . '/' . $plugin_name;

            $plugins[] = $pluginsInfo;
            file_put_contents(self::$json_path, json_encode($plugins));
            return true;
        } else {
            exec('cd "' . ROOT_PATH . '" && composer remove ' . $vendor . '/' . $plugin_name);

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
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => "https://packagist.org/p/$vendor/$plugin_name.json",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ]
        );

        $response = json_decode(curl_exec($cu), true);

        reset($response['packages'][$vendor . '/' . $plugin_name]['dev-master']['autoload']['psr-4']);
        if (isset($response['packages'][$vendor . '/' . $plugin_name]['dev-master']['autoload']['psr-4'])) {
            $first_key = key($response['packages'][$vendor . '/' . $plugin_name]['dev-master']['autoload']['psr-4']);

            if (class_exists($first_key . 'Plugin')) {
                return ($first_key . 'Plugin')::info();
            }
        }

        return [];
    }
}