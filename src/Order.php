<?php

namespace wahyuief\phpcertcentral;

use Wahyuief\PhpCertcentral\Util;
use Wahyuief\PhpCertcentral\Client;

class Order {

    public static function submit($product_id, $data)
    {
        return Client::request('post', Util::base_url('order/certificate', $product_id), json_encode($data));
    }

    public static function get($param = '')
    {
        return Client::request('get', Util::base_url('order/certificate', $param));
    }

    public static function get_by_domain($domain)
    {
        $datas = json_decode(self::get(), true);
        $data = array();
        $data['orders'] = array_filter($datas['orders'], function ($key) use ($domain) {
            return str_contains(strtolower($key['certificate']['common_name']), strtolower($domain));
        });

        return json_encode($data);
    }
    
}