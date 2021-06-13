<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">

            <?php foreach ($projectsArray as $projectElem): ?>
                <li class="main-navigation__list-item">
                    <a class="main-navigation__list-item-link" href="/?projectid=<?php

        if(isset($projectElem['id'])) {
            echo $projectElem['id'];
        }
                   else {
                    echo '';
                   }


                    ?>"><?php echo $projectElem['name']; ?></a>
                    <span class="main-navigation__list-item-count"><?php
                        echo countTasksCat($tasksArray, $projectElem["id"]); ?>
                                </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="/add.php" target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/?all" class="tasks-switch__item ">Все задачи</a>
            <a href="/?day" class="tasks-switch__item ">Повестка дня</a>
            <a href="/?tomorrow" class="tasks-switch__item">Завтра</a>
            <a href="/?overdued" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">

            <input class="checkbox__input visually-hidden show_completed <?php echo "checked"; ?>" type="checkbox">

            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
  <?php   if(isset($_GET['projectid'])){
                $tasksArr = $accurateCatTasksArr;
            }
            elseif(empty($_GET['projectid'])) {
                $tasksArr = $tasksArray;
            };?>


        <?php  foreach ($tasksArr as $tasksListElem): ?>
            <?php
            if (isset($tasksListElem['finishdate'])) {
                $date = strtotime($tasksListElem['finishdate']);
            }

            $now = strtotime("now");
            $datedif = $date - $now;
            $hourstofinish = $datedif / 3600;
            ?>

<?php if ($now>$date): ?>
<?php continue; ?>

    <?php else: ?>
            <tr class="tasks__item task <?php if ($tasksListElem['status'] === 1) {
                echo "task--completed";
            } ?><?php if ($hourstofinish <= 24) {
                echo "task--important";
            }
            ?>">
                <td class="task__select">

                    <label class="checkbox task__checkbox">
                        <input
                            class="checkbox__input visually-hidden task__checkbox" <?php if ($tasksListElem['status'] === "1") {
                            echo "checked";
                        } ?>
                            type="checkbox" value="1">
                        <span class="checkbox__text"><?php echo $tasksListElem['taskname']; ?>
                                </span>
                    </label>

                </td>

                <td class="task__file">
                <?php if (strlen($tasksListElem['filelink'])>0):?>
                    <a class="download-link" href="<?php echo $tasksListElem['filelink']; ?>"><?php echo $tasksListElem['filelink'];?></a>
                    <?php endif; ?>
                </td>

                <td class="task__date "><?php


                    echo $tasksListElem['finishdate'];


                    ?>
                </td>
            </tr>
            <?php endif;?>
        <?php endforeach; ?>


    </table>
</main>
</div>
</div>
<script>
/*let tasksSwitchItem = document.querySelectorAll(".tasks-switch__item");
tasksSwitchItem[0].classList.add("tasks-switch__item--active");

for (let i = 0; i<tasksSwitchItem.length; i++) {
    tasksSwitchItem[i].addEventListener("click", toggleClassActive);
}

function toggleClassActive (e) {
    tasksSwitchItem.forEach(n => n.classList.remove('tasks-switch__item--active'));
    e.target.classList.toggle("tasks-switch__item--active");
}*/


</script>
