<?php
namespace TaskMgr;

require 'Utils.php';
require 'db.php';

class DbTaskMgr
{
    public static function AddUser($login, $password): int {
        $hash = Utils::GenPassHash($password);

        //anti injection
        $db_stmt = Db::GetDb()->prepare("INSERT INTO users (`login`, `pwd_hash`) VALUES (?, ?)");
        $db_stmt->bind_param("ss", $login, $hash);
        $result = $db_stmt->execute();

        //return record id if success, if fail return -1
        if ($result):
            return $db_stmt->insert_id;
        else:
            return -1;
        endif;
    }

    public static function ValidateUser($login, $password): int{
        $hash = Utils::GenPassHash($password);

        //anti injection
        $db_stmt = Db::GetDb()->prepare("SELECT id FROM users WHERE login=? AND pwd_hash=?");
        $db_stmt->bind_param("ss", $login, $hash);
        $db_stmt->execute();
        $result = $db_stmt->get_result()->fetch_assoc();
        if ($result != null):
            return $result["id"];
        else:
            return -1;
        endif;
    }

    public static function GetNewAuthCookie($user_id): ?array {
        $cookie = Utils::GenAuthCookie($user_id);
        //1 week
        $expire_date = time() + 60*60*24*7;
        if (Db::GetDb()->query("INSERT INTO auth_cookie VALUES (NULL, ${user_id}, \"{$cookie}\", FROM_UNIXTIME(\"${expire_date}\"))")):
            return array($cookie, $expire_date);
        else:
            return null;
        endif;
    }

    public static function ValidateAuthCookie($cookie): int {
        $db_stmt = Db::GetDb()->prepare("SELECT user_id, UNIX_TIMESTAMP(expire_date) as expire_date FROM auth_cookie WHERE cookie=?");
        $db_stmt->bind_param("s", $cookie);
        $db_stmt->execute();
        $result = $db_stmt->get_result()->fetch_assoc();
        if ($result != null and $result['expire_date'] > time()){
            return $result['user_id'];
        }
        return -1;
    }

    public static function AddTask($user_id, $text): int{
        $db_stmt = Db::GetDb()->prepare("INSERT INTO tasks (`user_id`, `text`, `create_time`) VALUES (?, ?, CURRENT_TIMESTAMP())");
        $db_stmt->bind_param("is", $user_id, $text);
        $result = $db_stmt->execute();

        //return record id if success, if fail return -1
        if ($result):
            return $db_stmt->insert_id;
        else:
            return -1;
        endif;
    }

    public static function DeleteTask($user_id, $task_id): bool{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM tasks WHERE user_id=? AND id=?");
        $db_stmt->bind_param("ii", $user_id, $task_id);
        $result = $db_stmt->execute();

        return $result;
    }

    public static function CompleteTask($user_id, $task_id): bool{
        $db_stmt = Db::GetDb()->prepare("UPDATE tasks SET complete_time=CURRENT_TIMESTAMP() WHERE user_id=? AND id=? AND ISNULL(complete_time)");
        $db_stmt->bind_param("ii", $user_id, $task_id);
        $result = $db_stmt->execute();

        return $result;
    }

    public static function GetTasks($user_id): array {
        $db_stmt = Db::GetDb()->prepare("SELECT id, text, UNIX_TIMESTAMP(complete_time) as complete_time FROM tasks WHERE user_id=?");
        $db_stmt->bind_param("s", $user_id);
        $db_stmt->execute();
        $tasks = array();
        $result = $db_stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        return $tasks;
    }
}
