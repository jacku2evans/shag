<?php

require_once('regClass.php');
require_once('db.class.php');
// require_once('password.class.php');

$db_host = 'localhost';
$db_user = 'mysql';
$db_password = 'mysql';
$db_name = 'pages_db';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new Registration($_POST);

if ($_POST) {
   if ($form->validate()) {
       $email = $db->escape($form->getEmail());
       $username = $db->escape($form->getUsername());
       $password = $db->escape($form->getPassword());

       $res = $db->query("SELECT * FROM user WHERE username = '{$username}'");
       if ($res) {
           $msg = 'Такой пользователь уже существует';
       } else {
           $db->query("INSERT INTO user (email, username, password) VALUES ('{$email}','{$username}','{$password}')");
           header('location: index.php?msg=Вы зарегестрированы');
       }

   } else {
       $msg = $form->passwordMatch() ? 'Заполните все поля' : 'Пароли не совпадают';
   }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация пользователя</h1>

<b><?=$msg; ?></b>

<br/>
<form method="post">
    Email: <input type="email" name="email" value="<?=$form->getEmail(); ?>"/> <br/><br/>
    Username: <input type="text" name="username" value="<?=$form->getUsername(); ?>"/> <br/><br/>
    Password: <input type="password" name="password"/> <br/><br/>
    Confirm password: <input type="password" name="confirmPassword"/> <br/><br/>
    <input type="submit"/>
</form>

</body>
</html>