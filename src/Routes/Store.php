<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Plugins;
use pxgamer\Minimin\Smarter;

/**
 * Class Store.
 */
class Store
{
    const STORE_PACKAGE_URL = 'https://packagist.org/search.json?tags=minimin-package';

    /**
     * @var \Smarty
     */
    public $S;

    /**
     * Store constructor.
     */
    public function __construct()
    {
        $this->S = Smarter::get();
    }

    public function index()
    {
        $this->S->display(
            'store/index.tpl',
            [
                'available' => $this->getPackages()->results,
                'installed' => Plugins::get(),
            ]
        );
    }

    public function search()
    {
    }

    /**
     * @param $vendor
     * @param $package
     */
    public function install($vendor, $package)
    {
        $install_status = Plugins::install($vendor, $package);

        $this->S->display(
            'store/install.tpl',
            [
                'vendor'  => $vendor,
                'package' => $package,
                'status'  => (object)$install_status,
            ]
        );
    }

    /**
     * @param $vendor
     * @param $package
     */
    public function uninstall($vendor, $package)
    {
        $install_status = Plugins::uninstall($vendor, $package);

        $this->S->display(
            'store/install.tpl',
            [
                'vendor'  => $vendor,
                'package' => $package,
                'status'  => (object)$install_status,
            ]
        );
    }

    public function update()
    {
        $install_status = Plugins::update();

        $this->S->display(
            'store/install.tpl',
            [
                'status' => (object)$install_status,
            ]
        );
    }

    /**
     * @param null|string $search_query
     * @return mixed
     */
    private function getPackages($search_query = null)
    {
        $url = self::STORE_PACKAGE_URL.($search_query ? '&q='.urlencode($search_query) : '');
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
            ]
        );
        return json_decode(curl_exec($cu));
    }
}
