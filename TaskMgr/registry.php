<?php
require 'DbTaskMgr.php';

if (ctype_alnum($_POST['login']) and ctype_alnum($_POST['password']) and ($_POST['r_password'] == $_POST['password'])):
    $user_id = \TaskMgr\DbTaskMgr::AddUser($_POST['login'], $_POST['password']);
    if ($user_id != -1){
        $result = \TaskMgr\DbTaskMgr::GetNewAuthCookie($user_id);
        if ($result != null){
            list($cookie, $expire_date) = $result;
            setcookie("auth", $cookie, $expire_date);
            header("Location: taskmgr.php");
        }
    }

    return;
else:
    echo '<script type="text/javascript">';
    echo ' alert("Bad login/password. Try again.");';  //not showing an alert box.
    echo ' window.location.replace("/main.php");';
    echo '</script>';
endif;


function GenerateAuthCookie(){}
