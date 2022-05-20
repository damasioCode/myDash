<?php

namespace Lib\Damakron\Database;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO("{$_ENV['DB_DRIVER']}: host={$_ENV['DB_HOST']}; dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
        }

        return self::$conn;
    }
}