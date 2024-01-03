<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .task {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .task:hover {
            background-color: #f5f5f5;
        }
        .task input[type="checkbox"] {
            margin-right: 10px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Pratik's Tasks</h1>
    <div id="taskList">
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <input type="checkbox" name="task" value="<?php echo $task; ?>" onclick="checkTask(this)">
                <?php echo $task; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <button onclick="createTask()">Create Task</button>
    <button onclick="deleteTask()">Delete Task</button>
</body>
<script>
    function checkTask(element) {
        if (element.checked) {
            element.parentNode.style.textDecoration = "line-through";
        } else {
            element.parentNode.style.textDecoration = "none";
        }
    }

    function createTask() {
        var taskName = prompt("Enter the task name:");
        if (taskName) {
            var taskList = document.getElementById("taskList");
            var task = document.createElement("div");
            task.className = "task";
            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "task";
            checkbox.value = taskName;
            checkbox.onclick = function() { checkTask(this); };
            task.appendChild(checkbox);
            task.appendChild(document.createTextNode(" " + taskName));
            taskList.appendChild(task);
        }
    }

    function deleteTask() {
        var taskList = document.getElementById("taskList");
        var tasks = taskList.getElementsByClassName("task");
        for (var i = tasks.length - 1; i >= 0; i--) {
            if (tasks[i].getElementsByTagName("input")[0].checked) {
                taskList.removeChild(tasks[i]);
            }
        }
    }
</script>
</html>