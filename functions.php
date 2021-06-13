<?php

function countTasksCat($tasksList, $tasksCatId)
{
    $countTasks = 0;



    foreach ($tasksList as $taskListElem) {
        $date = strtotime($taskListElem['finishdate']);
        $now = strtotime("now");
        if ($taskListElem['projectid'] === $tasksCatId) {
            if ($taskListElem['status']==1||($date<$now)) {
              continue;
            }
            else {
                $countTasks = $countTasks + 1;
            }
        }
    }
    if ($countTasks > 0) {
        return $countTasks;
    } else {
        return 0;
    }
}
function mainMistake() {
    header("Location: 404.php");
}

function toTheMainPage() {
    header("Location: /");
}
