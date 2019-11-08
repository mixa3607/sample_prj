<?php
namespace TaskMgr;

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/DbTaskMgr.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/class/Utils.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<head>
    <link rel="stylesheet" href="/static/css/main.css">
    <script src="static/js/taskmgr.js"></script>
</head>

<body>
<?php
$user_id = DbTaskMgr::ValidateAuthCookie($_COOKIE['auth']);
if ($user_id == -1) {
    Utils::ShowAlertAndRedirect("Bad auth data. Please login again.", "/main.php");
}
?>
<div class="container">
    <div>
        <table id="tasks" border="1" width="100%" cellpadding="5">
            <tr>
                <th>Task</th>
                <th></th>
            </tr>

            <?php
            $tasks = DbTaskMgr::GetTasks($user_id);
            foreach ($tasks as $task) {
                if ($task['complete_time']) {
                    $bg_color = '#b2ff1b';
                } else {
                    $bg_color = '#ffb3d4';
                }
                $decodedText = urldecode($task['text']);
                echo("<tr bgcolor=\"${bg_color}\">
                <td class=\"task_text\">${decodedText}</td>
                <td class=\"task_checkbox\">
                    <input taskid=\"${task['id']}\" type=\"checkbox\">
                </td>
            </tr>");
            }
            ?>
        </table>
        <button onclick="markAsCompletedTasks()">Mark as completed</button>
        <button onclick="deleteTasks()">Delete</button>
    </div>
    <hr>
    <div>
        <textarea id="task_text" cols="40" rows="5"></textarea>
        <button onclick="addTask()">Add task</button>
    </div>
    <hr>
    <div>
        <button onclick="logout()">Logout</button>
    </div>
</div>

</body>