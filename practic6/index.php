<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Админ панель</title>
</head>
<body>
    <?php
    session_start();
    
    // Проверяем, отправлена ли форма авторизации
    if(isset($_POST['submit'])){
      // Заданные учетные данные
      $validUsername = 'admin@mail.ru';
      $validPassword = 'adminadmin';
    
      // Получаем введенные пользователем логин и пароль
      $username = $_POST['username']; // Предполагается, что поле логина называется "username"
      $password = $_POST['password']; // Предполагается, что поле пароля называется "password"
    
      // Выполняем экранирование данных перед использованием
      $username = htmlspecialchars($username);
      $password = htmlspecialchars($password);
    
      // Проверяем соответствие введенных данных заданным учетным данным
      if($username === $validUsername && $password === $validPassword){
        // Авторизация успешна
        $_SESSION['username'] = $username;
        $isLoggedIn = true;
        echo "Вы успешно вошли на сайт!";
      } else {
        // Авторизация неуспешна
        echo "Неправильный логин или пароль!";
      }
    }
    
    // Код для кнопки "Выход" на сайте
    if(isset($_POST['logout'])){
      session_destroy();
      $isLoggedIn = false;
      echo "Вы успешно вышли с сайта!";
    }
    
    ?>
    
    <!-- Форма авторизации -->
    <?php if(!isset($isLoggedIn) || !$isLoggedIn) { ?>
      <form method="post" action="">
        <input type="text" name="username" placeholder="Логин" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <input type="submit" name="submit" value="Войти">
      </form>
    <?php } ?>
    
    <!-- Форма для кнопки "Выход" -->
    <?php if(isset($isLoggedIn) && $isLoggedIn) { ?>
      <form method="post" action="">
        <input type="submit" name="logout" value="Выход">
      </form>
    <?php } ?>

</body>
</html>