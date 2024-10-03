<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Софьин Н.Д.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwvykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/button.js"></script>
</head>
<body>
    <div class="vanger">
        <div class="opt_reg">
            <div class="reg">
                <h1>Регистрация<h1>
            </div>
        </div>
        <div class="opt_reg">
            <div class="data">
                <form method="POST" action="registration.php">
                    <div class="registr"><input class="form" type="email" name="email" placeholder="Email"></div>
                    <div class="registr"><input class="form" type="text" name="username" placeholder="Login"></div>
                    <div class="registr"><input class="form" type="password" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_red btn__reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

require_once('bd.php');
$link = mysqli_connect('127.0.0.1', 'root', '12345', 'tsar_bd');

if (isset($_COOKIE['User'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  
  if(!mysqli_query($link, $sql)) {
  echo "Не удалось добавить пользователя";
  }

}
?>
