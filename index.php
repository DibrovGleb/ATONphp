<? session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="root">
    <? if (isset($_SESSION['authenticated'])) : ?>
      <div class="container">
        <? echo "<ul> <li>Имя: <span>" . $_SESSION['fio'] . "</span></li>
      <li>Логин: <span>" . $_SESSION['login'] . "</span></li></ul>"; ?>
        <a href="allclients.php">Все клиенты</a>
        <form action="">
          <input type="submit" value="Выйти" formaction="logout.php">
        </form>

      </div>
      <? require_once 'clients.php'; ?>
    <? else : ?>
      <div class="container">
        <h2>Авторизация</h2>
        <form method="post">
          <label for="login">Логин:</label>
          <input type="text" id="login" name="login" required>
          <br>
          <label for="password">Пароль:</label>
          <input type="password" id="password" name="password" required>
          <br>
          <input type="submit" value="Войти" formaction="login.php">
        </form>
      </div>
    <? endif; ?>
  </div>
</body>
<?php
//echo uniqid();
?>

</html>