<?php

namespace wahyuief\phpcertcentral;

use Wahyuief\PhpCertcentral\Util;
use WpOrg\Requests\Requests;

class Client {

    public static $digicert_token;
    public static $content_type;
    
    public function __construct($digicert_token)
    {
        self::$digicert_token = $digicert_token;
        self::$content_type = 'application/json';
    }

    public static function request(...$param)
    {
        $headers = array(
            'X-DC-DEVKEY' => self::$digicert_token,
            'Connection' => 'keep-alive',
            'Accept' => self::$content_type,
            'Content-Type' => self::$content_type,
        );

        $options = array(
            'useragent' => 'wahyuief/phpcertcentral',
            'verify' => true,
        );

        $method = $param[0];
        $response = (isset($param[2]) ? Requests::$method($param[1], $headers, $param[2], $options) : Requests::$method($param[1], $headers, $options));

        return $response->body;
    }
    
}