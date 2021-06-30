<?php session_start(); ?>
<?php require_once ('helpers.php'); ?>
<?php require_once ('functions.php'); ?>
<?php require_once ('connection.php'); ?>
<?php
$title = "Страница регистрации";

$email = '';
if (isset($_POST['email']))
{
    $email = $_POST['email'];
}

$password = '';
if (isset($_POST['password']))
{
    $password = $_POST['password'];
}

if (isset($_POST['name']))
{
    $name = $_POST['name'];
}
else
{
    $name = '';
}

$errors = [];

if (isset($_POST['submitregister']))
{

    if (empty($email))
    {
        $errors['emptyemail'] = "Пустой email";
    }
    else if(strlen($email)<3){
        $errors['too_short_email'] = "Слишко короткий майл";
    }

    $emailcorrect = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($emailcorrect===false)
    {
        $errors['false_email'] = "Email Неверного формата";

    }

    if (empty($_POST['password']))
    {
        $errors['emptypassword'] = "Пустой password";
    }

    if (empty($name))
    {
        $errors['name'] = "Пустое имя";
    }
    $selectUsers = "SELECT * FROM users";
    $selectUsersQuery = mysqli_query($con, $selectUsers);
    $selectUsersArray = mysqli_fetch_all($selectUsersQuery, MYSQLI_ASSOC);

    foreach ($selectUsersArray as $allUsers) {
        
        if (in_array($email, $allUsers)) {
            $errors['repeatuser'] = "Такой юзер уже существует. Попробуйте другой email адрес!";
        }
    }



    if (!$errors)
    {
        $inputUsers = "INSERT INTO users(registrationdate, email, name, password)
    VALUES (CURRENT_TIMESTAMP, '$email', '$name', '$password')";
        mysqli_query($con, $inputUsers);

        $selectUser = "SELECT id, name, email, password FROM users WHERE email = '" . $email . "'";
        $selectUserDb = mysqli_query($con, $selectUser);
        $selectUserArray = mysqli_fetch_array($selectUserDb, MYSQLI_ASSOC);


        if (isset($selectUserArray['id']))
        {
            $_SESSION['iduser'] = $selectUserArray['id'];
            $_SESSION['username'] = $selectUserArray['name'];
        }

    }
}

$content = include_template('register.php', ["title" => $title, "errors" => $errors, "password" => $password]);
$layoutContent = include_template('layout.php', ["content" => $content, "title" => $title]);
print ($layoutContent);
