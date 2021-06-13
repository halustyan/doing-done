    <div class="content">
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

        <a class="button button--transparent button--plus content__side-button" href="/add.php">Добавить проект</a>
      </section>

      <main class="content__main">
        <h2 class="content__main-heading">Добавление задачи</h2>

        <form class="form" enctype="multipart/form-data" action="/add.php" method="post" autocomplete="off">
          <div class="form__row">
            <label class="form__label" for="name">Название <sup>*</sup></label>

            <input class="form__input <?php if(isset($errors['name'])){echo "form__input--error";}?>"
            type="text" name="name" id="name" value="<?php
            if(!empty($errors)){
                echo $_POST['name'];
            }


            ?>" placeholder="Введите название">

            <p class="form__message"><?php if(isset($errors['name'])){echo $errors['name'];} ?></p>
          </div>

          <div class="form__row">

            <label class="form__label" for="project">Проект </label>
            <select class="form__input form__input--select <?php if(isset($errors['project'])){echo "form__input--error";}?>" name="project" id="project">
            <option value="" >

            </option>

            <?php foreach ($projectsArray as $projectElem): ?>
              <option value="<?php echo $projectElem['name']; ?>" ><?php echo $projectElem['name']; ?></option>
             <?php endforeach; ?>
            </select>
            <p class="form__message"><?php if(isset($errors['project'])){echo $errors['project'];} ?></p>
          </div>

          <div class="form__row">
            <label class="form__label" for="date">Дата выполнения</label>

            <input class="form__input form__input--date <?php if(isset($errors['date'])){echo "form__input--error";}?>" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <p class="form__message"><?php if(isset($errors['date'])){echo $errors['date'];} ?></p>
          </div>

          <div class="form__row">
            <label class="form__label" for="file">Файл</label>

            <div class="form__input-file">
              <input class="visually-hidden" type="file" name="file" id="file" value="">

              <label class="button button--transparent" for="file">
                <span>Выберите файл</span>
              </label>
            </div>
          </div>

          <div class="form__row form__row--controls">
            <input class="button" type="submit" name="add-task" value="Добавить">
          </div>
        </form>
      </main>
    </div>
  </div>
</div>

