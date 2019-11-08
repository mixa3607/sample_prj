<?php
namespace TaskMgr\Auth;

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/DbTaskMgr.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/Utils.php';

use TaskMgr\DbTaskMgr;
use TaskMgr\Utils;

$login = $_POST['login'];
$password = $_POST['password'];

if (ctype_alnum($login) and ctype_alnum($password)){
    $user_id = DbTaskMgr::ValidateUser($login, $password);
    if ($user_id != -1){
        $result = DbTaskMgr::GetNewAuthCookie($user_id);
        if ($result != null){
            list($cookie, $expire_date) = $result;
            setcookie("auth", $cookie, $expire_date, "/");
            header("Location: /taskmgr.php");
            return;
        }
    }
}
Utils::ShowAlertAndRedirect("Bad login/password. Try again.", "/main.php");
