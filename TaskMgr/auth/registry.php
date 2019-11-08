<?php
namespace TaskMgr\Auth;

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/DbTaskMgr.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/Utils.php';

use TaskMgr\DbTaskMgr;
use TaskMgr\Utils;

$login = $_POST['login'];
$password = $_POST['password'];
$r_password = $_POST['r_password'];

if (DbTaskMgr::CheckUserExist($login)){
    Utils::ShowAlertAndRedirect("User with this login already exist!", "/main.php");
}
elseif ($r_password != $password){
    Utils::ShowAlertAndRedirect("Passwords not equal!", "/main.php");
}
elseif (!(ctype_alnum($login) and ctype_alnum($password))){
    Utils::ShowAlertAndRedirect("Allow only digits and letters!", "/main.php");
}
else{
    $user_id = DbTaskMgr::AddUser($login, $password);
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

