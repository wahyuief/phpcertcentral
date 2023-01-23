<?php

namespace wahyuief\phpcertcentral;

use Wahyuief\PhpCertcentral\Util;
use Wahyuief\PhpCertcentral\Client;

class Certificate {

    public static function download($cert_id, $cert_format)
    {
        return Client::request('get', Util::base_url('certificate', $cert_id, 'download/format', $cert_format));
    }

    public static function download_by_order($order_id, $cert_format)
    {
        return Client::request('get', Util::base_url('certificate', 'download/order', $order_id, 'format', $cert_format));
    }

    public static function chain($cert_id)
    {
        return Client::request('get', Util::base_url('certificate', $cert_id, 'chain'));
    }

    public static function revoke($cert_id)
    {
        return Client::request('put', Util::base_url('certificate', $cert_id, 'revoke'));
    }
    
}