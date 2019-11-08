<?php
namespace TaskMgr;

require 'DbTaskMgr.php';
include 'header.php';

$user_id = DbTaskMgr::ValidateAuthCookie($_COOKIE['auth']);
if ($user_id == -1){
    echo '<script type="text/javascript">';
    echo ' alert("Bad auth data. Please login again.");';  //not showing an alert box.
    echo ' window.location.replace("/main.php");';
    echo '</script>';
}?>
<script>
    function sendPost(url, data) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, false);
        xhr.withCredentials = true;
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.send(data);
        return {
            code: xhr.status,
            text: xhr.responseText
        };
    }

    function markAsCompletedTasks(){
        let tasks = getSelTasks();
        let result = sendPost("/taskmaster.php", "action=complete&ids=" + tasks.join(','));
        tasks.forEach(function (taskId) {
            document.querySelector("input[taskid='" + taskId + "']").parentElement.parentElement.style.backgroundColor = "#b2ff1b";
        });
        uncheckAllTasks();
    }

    function deleteTasks() {
        let tasks = getSelTasks();
        let result = sendPost("/taskmaster.php", "action=delete&ids=" + tasks.join(','));
        tasks.forEach(function (taskId) {
            document.querySelector("input[taskid='" + taskId + "']").parentElement.parentElement.remove();
        });
    }
    function getSelTasks(){
        let taskIds = [];
        document.querySelectorAll(".task_checkbox > input:checked").forEach(function(inp){taskIds.push(inp.getAttribute("taskid"))});
        //console.log(taskIds); //debug
        return taskIds;
    }
    function uncheckAllTasks(){
        let tasks = getSelTasks();
        tasks.forEach(function (taskId) {
            document.querySelector("input[taskid='" + taskId + "']").checked = false;
        })
    }
    function addTask(){
        let rawText = document.querySelector("#task_text").value
        let encodedText = encodeURI(rawText);
        //console.log(text); //debug
        let result = sendPost("/taskmaster.php", "action=add&text=" + encodedText);
        if (result.code === 200){
            let tr = document.createElement("tr");
            tr.style.backgroundColor = "#ffb3d4";

            let td1 = document.createElement("td");
            td1.className = "task_text";
            td1.innerText = rawText;

            let td2 = document.createElement("td");
            td2.className = "task_checkbox";

            let input = document.createElement("input");
            input.type = "checkbox";
            input.setAttribute("taskid", result.text);

            td2.append(input);
            tr.append(td1);
            tr.append(td2);

            document.querySelector("#tasks > tbody").append(tr);
        }
        else{
            alert("Something went wrong. Please try again.")
        }
        //alert("code: " + result.code + " text: " + result.text);
        //console.log(result.text)
    }
    function logout() {
        document.cookie = "auth=";
        window.location.replace("/main.php");
    }
</script>
<div class="container">
    <div>
        <table id="tasks" border="1" width="100%" cellpadding="5">
            <tr>
                <th>Task</th>
                <th>Complete</th>
            </tr>

            <?php
            $tasks = DbTaskMgr::GetTasks($user_id);
            foreach ($tasks as $task) {
                if ($task['complete_time']){ $bg_color = '#b2ff1b';}
                else{ $bg_color = '#ffb3d4';}
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
        <button onclick="deleteTasks()" >Delete</button>
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
