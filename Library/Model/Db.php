<?php


namespace Model;

use Config\DbConfig;
use mysqli;

class Db
{
    private static $db = null;

    public static function GetDb(): mysqli{
        if (static::$db == null){
            $db = mysqli_connect(DbConfig::HOST . ':' . DbConfig::PORT, DbConfig::LOGIN, DbConfig::PASSWORD, DbConfig::DB_NAME);
            $db->set_charset("utf8");
            static::$db = $db;
        }
        return static::$db;
    }
}