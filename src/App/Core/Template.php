<?php

namespace App\Core;

class Template
{

    public static function getUrl() {
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
        return $protocol . '://' . $_SERVER['HTTP_HOST'];
    }

}