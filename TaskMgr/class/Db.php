<?php
namespace TaskMgr;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/DbConfig.php';

use mysqli;
use TaskMgr\Config\DbConfig;

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