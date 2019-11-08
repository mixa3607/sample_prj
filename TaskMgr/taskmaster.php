<?php
namespace TaskMgr;

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/DbTaskMgr.php';

$user_id = DbTaskMgr::ValidateAuthCookie($_COOKIE['auth']);
$action = $_POST['action'];

if ($user_id == -1){
    http_response_code(401); //unauthorized
    return;
}

if ($action == "add"){
    $text = htmlspecialchars($_POST["text"]);
    if (strlen($text) != 0 and ($task_id = DbTaskMgr::AddTask($user_id, $text)) != -1){
        print $task_id;
    }
    else{
        http_response_code(409); //conflict
    }
}
if ($action == "delete" or $action == "complete"){
    $str = htmlspecialchars($_POST["ids"]);
    if (strlen($str) != 0){
        try{
            $ids = explode(',', $str);
            foreach ($ids as $id){
                if ($action == "delete"){
                    DbTaskMgr::DeleteTask($user_id, $id);
                }
                else{
                    DbTaskMgr::CompleteTask($user_id, $id);
                }
            }
        }
        catch (Exception $e){
            http_response_code(409); //conflict
            return;
        }
    }
}
