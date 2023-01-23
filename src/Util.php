<?php

namespace wahyuief\phpcertcentral;

define('BASE_URL', 'https://www.digicert.com/services/v2');
define('SEPARATOR', '/');

class Util {
    
    public static function base_url(...$url) {
        return (str_ends_with(BASE_URL, SEPARATOR) ? BASE_URL : BASE_URL . SEPARATOR) . self::normalize($url);
    }

    public static function normalize($url) {
        $normalized = array();
        foreach ($url as $key => $value) {
            if ($value) {
                $value = ltrim($value, SEPARATOR);
                $value = rtrim($value, SEPARATOR);
                $normalized[$key] = $value;
            }
        }
        return join(SEPARATOR, $normalized);
    }
}