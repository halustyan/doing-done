<?php require_once('connection.php'); ?>
<?php require_once('helpers.php'); ?>
<?php require_once('functions.php'); ?>
<?php

$title = "Добавление задачи";

$getProjects = "SELECT * FROM projects";
$getProjectsQuery = mysqli_query($con, $getProjects);
$projectsArray = mysqli_fetch_all($getProjectsQuery, MYSQLI_ASSOC);

/*Получаю список заданий*/
$getTasks = "SELECT * FROM tasks";
$getTasksQuery = mysqli_query($con, $getTasks);
$tasksArray = mysqli_fetch_all($getTasksQuery, MYSQLI_ASSOC);

$errors = [];
if (isset($_POST['add-task'])) {

    if (empty($_POST['name'])) {
        $errors['name'] = "Пустое имя!";
    }

    if (empty($_POST['date'])) {
        $errors['date'] = "Пустая дата!";
    }


    if (empty($_POST['project'])) {
        $errors['project'] = "Не выбран проект!";
    }
    if (!$errors) {
        $fileName = $_FILES['file']['name'];
        $filePath = __DIR__;
        if (!$fileName) {
            $errors['img'] = "Не выбрана картинка!";
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], $filePath . $fileName);
        }

       // $dateOfCreation = date('Y-m-d');

        $finishDate = $_POST['date'];
        $now = time();
        $taskName = $_POST['name'];
        $authorId = 1;

        $projectName = $_POST['project'];

        $getProjectId = "SELECT * FROM projects WHERE name = '$projectName'";
        $getProjectIdQuery = mysqli_query($con, $getProjectId);
        $projectId = mysqli_fetch_array($getProjectIdQuery, MYSQLI_ASSOC);

        $projectIdInput = $projectId["id"];

        $inputTasks = "INSERT INTO tasks(dateofcreation, status, taskname, filelink, finishdate, authorid, projectid)
        VALUES (CURRENT_TIMESTAMP, 0, '$taskName', '$fileName', '$finishDate', $authorId, $projectIdInput)";
        $inputTasksQuery = mysqli_query($con, $inputTasks);
        if ($inputTasksQuery) {
            toTheMainPage();
        }
    }
}

$content = include_template('add.php', ["title" => $title, "errors" => $errors, "projectsArray" => $projectsArray, "tasksArray" => $tasksArray]);
$layoutContent = include_template('layout.php', ["content" => $content, "title" => $title]);
print($layoutContent);
