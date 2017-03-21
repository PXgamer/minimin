<?php

namespace pxgamer\Minimin\Routes;

use pxgamer\Minimin\Smarter;

class Store
{
    const STORE_PACKAGE_URL = 'https://packagist.org/search.json?tags=minimin-package';

    public $S;

    public function __construct()
    {
        $this->S = (new Smarter)->get();
    }

    public function index()
    {
        $this->S->display('store/index.tpl');
    }

    public function search()
    {

    }

    private function getPackages($search_query = null)
    {
        $url = self::STORE_PACKAGE_URL . ($search_query ? '&q=' . urlencode($search_query) : '');
        $cu = curl_init($url);
        return json_decode(curl_exec($cu));
    }
}