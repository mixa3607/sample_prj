<?php
require 'DbTaskMgr.php';

$login = $_POST['login'];
$password = $_POST['password'];
if (ctype_alnum($login) and ctype_alnum($password)){
    $user_id = \TaskMgr\DbTaskMgr::ValidateUser($login, $password);
    //echo($user_id);
    if ($user_id != -1){
        $result = \TaskMgr\DbTaskMgr::GetNewAuthCookie($user_id);
        if ($result != null){
            list($cookie, $expire_date) = $result;
            //echo($cookie);
            setcookie("auth", $cookie, $expire_date);
            header("Location: taskmgr.php");
            return;
        }
    }
}
echo '<script type="text/javascript">';
echo ' alert("Bad login/password. Try again.");';  //not showing an alert box.
echo ' window.location.replace("/main.php");';
echo '</script>';


//echo htmlspecialchars($_POST['login']); ?>