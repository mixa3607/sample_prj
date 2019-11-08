<?php


namespace TaskMgr;

use mysqli;

require 'config/db_config.php';
class Db
{
    private static $db = null;
    public static function GetDb(): mysqli{
        if (static::$db == null){
            $db = mysqli_connect(DbConfig::HOST . ':' . DbConfig::PORT, DbConfig::LOGIN, DbConfig::PASSWORD, DbConfig::DB_NAME);
            static::$db = $db;
        }
        return static::$db;
    }
}