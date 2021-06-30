

      <div class="content">
        <section class="content__side">
          <p class="content__side-info">Если у вас уже есть аккаунт, авторизуйтесь на сайте</p>

          <a class="button button--transparent content__side-button" href="auth.php">Войти</a>
        </section>

        <main class="content__main">
          <h2 class="content__main-heading">Регистрация аккаунта</h2>

          <form class="form" action="/register.php" method="post" autocomplete="off">
            <div class="form__row">
              <label class="form__label" for="email">E-mail <sup>*</sup></label>

              <input class="form__input <?php
                 if (isset($errors['emptyemail'])||isset($errors['false_email'])||isset($errors['repeatuser'])){
                  echo "form__input--error";}?>" type="text" name="email" id="email" value="" placeholder="Введите e-mail" required>

              <p class="form__message">

              <?php

                 if (isset($errors['emptyemail'])){
                  echo $errors['emptyemail'];
                 }
                 ?><br>
                 <?php
                 if (isset($errors['false_email'])){
                  echo $errors['false_email'];
                 }?>
     <?php
                 if (isset($errors['repeatuser'])){
                  echo $errors['repeatuser'];
                 }?>

                 </p>
            </div>

            <div class="form__row">
              <label class="form__label" for="password">Пароль <sup>*</sup></label>

              <input class="form__input <?php
                 if (isset($errors['emptypassword'])){
                  echo "form__input--error";
                 }?>" type="password" name="password" id="password" value="" placeholder="Введите пароль";

required>

                      <p class="form__message"><?php
                 if (isset($errors['emptypassword'])){
                  echo $errors['emptypassword'];
                 }?></p>

            </div>

            <div class="form__row">
              <label class="form__label" for="name">Имя <sup>*</sup></label>

              <input class="form__input <?php
                 if (isset($errors['name'])){
                  echo "form__input--error";
                 }?>" type="text" name="name" id="name" value="" placeholder="Введите имя" required>

<p class="form__message"><?php
                 if (isset($errors['name'])){
                  echo $errors['name'];
                 }?></p>
            </div>

            <div class="form__row form__row--controls">
            
            <?php if(isset($errors)&&(count($errors)>0)): ?>
              <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
              <?php endif; ?>

              <input class="button" type="submit" name="submitregister" value="Зарегистрироваться">
            </div>
          </form>
        </main>
      </div>
    </div>
  </div>
