<?php session_start(); ?>
<?php require_once('helpers.php'); ?>
<?php require_once('functions.php'); ?>
<?php require_once('connection.php'); ?>
<?php

$title = "Главная";

/*Получаю имена проэктов*/
$getProjects = "SELECT * FROM projects";
$getProjectsQuery = mysqli_query($con, $getProjects);
$projectsArray = mysqli_fetch_all($getProjectsQuery, MYSQLI_ASSOC);

$accurateCatTasksArr = '';
if(isset($_GET['projectid'])) {
    $projectid = $_GET['projectid'];
    $accurateCatTasks = "SELECT * FROM tasks WHERE projectid = ".$projectid;
    $getAccurateCatTasksQuery = mysqli_query($con, $accurateCatTasks);
    $accurateCatTasksArr = mysqli_fetch_all($getAccurateCatTasksQuery, MYSQLI_ASSOC);
}


/*Получаю список заданий*/
$getTasks = "SELECT * FROM tasks";
$getTasksQuery = mysqli_query($con, $getTasks);
$tasksArray = mysqli_fetch_all($getTasksQuery, MYSQLI_ASSOC);


$day = "";
$getDailyTasksArray = "";
if (isset($_GET['day'])) {
    $day = mysqli_real_escape_string($con, $_GET['day']);
    $getDailyTasks = "SELECT * FROM tasks WHERE finishdate = CURRENT_DATE()";
    $getDailyTasksQuery = mysqli_query($con, $getDailyTasks);
    $getDailyTasksArray = mysqli_fetch_all($getDailyTasksQuery, MYSQLI_ASSOC);
}

   $tomorrow= "";
   $getTomorrowTasksArray = '';
if (isset($_GET['tomorrow'])) {
    $tomorrow = mysqli_real_escape_string($con, $_GET['tomorrow']);
    $getTomorrowTasks = "SELECT * FROM tasks WHERE finishdate = CURRENT_DATE()+1";
    $getTomorrowTasksQuery = mysqli_query($con, $getTomorrowTasks);
    $getTomorrowTasksArray = mysqli_fetch_all($getTomorrowTasksQuery, MYSQLI_ASSOC);
}

$overdued = '';
$getOverDuedTasksArray = '';
if (isset($_GET['overdued'])) {
    $overdued = mysqli_real_escape_string($con, $_GET['overdued']);
    $getOverDuedTasks = "SELECT * FROM tasks WHERE finishdate < CURRENT_DATE()";
    $getOverDuedTasksQuery = mysqli_query($con, $getOverDuedTasks);
    $getOverDuedTasksArray = mysqli_fetch_all($getOverDuedTasksQuery, MYSQLI_ASSOC);
}
if (empty($_SESSION)) {
    header("Location: guest.php");
} 

$content = include_template('main.php', ["tasksArray" => $tasksArray, "getOverDuedTasksArray"=>$getOverDuedTasksArray, "getDailyTasksArray"=>$getDailyTasksArray, "getTomorrowTasksArray"=>$getTomorrowTasksArray, "title"=>$title, "projectsArray" => $projectsArray, "accurateCatTasksArr"=>$accurateCatTasksArr]);
$layoutContent = include_template('layout.php', ["content" => $content, "title"=>$title]);
print($layoutContent);
