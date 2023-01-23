<?php

namespace wahyuief\phpcertcentral;

use Wahyuief\PhpCertcentral\Util;
use Wahyuief\PhpCertcentral\Client;

class Organization {

    public static function get($param = '')
    {
        return Client::request('get', Util::base_url('organization', $param));
    }

    public static function get_by_name($name)
    {
        $datas = json_decode(self::get(), true);
        $data = array();
        $data['organizations'] = array_filter($datas['organizations'], function ($key) use ($name) {
            return str_contains(strtolower($key['name']), strtolower($name));
        });

        return json_encode($data);
    }
    
}