<?php

namespace Lib\Damakron\Database;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO(DB_DRIVER.': host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
        }

        return self::$conn;
    }
}