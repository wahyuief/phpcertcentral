<?php

namespace wahyuief\phpcertcentral;

use Wahyuief\PhpCertcentral\Util;
use Wahyuief\PhpCertcentral\Client;

class Product {

    public static function get($param = '')
    {
        return Client::request('get', Util::base_url('product', $param));
    }

    public static function get_by_name($name)
    {
        $datas = json_decode(self::get(), true);
        $data = array();
        $data['products'] = array_filter($datas['products'], function ($key) use ($name) {
            return str_contains(strtolower($key['name']), strtolower($name));
        });

        return json_encode($data);
    }
    
}