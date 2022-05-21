<?php

namespace App\Core;

class Template
{

    public static function getUrl() {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/myDash/src';
    }

}