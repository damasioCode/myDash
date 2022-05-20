<?php

namespace Damakron\Database;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO("{$_ENV['DATABASE_DRIVER']}: host={$_ENV['DATABASE_HOST']}; dbname={$_ENV['DATABASE_NAME']}", $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
        }

        return self::$conn;
    }
}