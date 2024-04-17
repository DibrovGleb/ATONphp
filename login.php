<?php
session_start();
require_once 'config.php';
echo "<link rel='stylesheet' href='style.css'>";
echo "<title>Вход</title>";
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $db->prepare('SELECT * FROM Users WHERE login = :login AND password = :password');
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['authenticated'] = true;
        $_SESSION['fio'] = $user['full_name'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        echo "<div class='message'><h3>Поздравляю <span>".$user['full_name']. ".</span><br>Вы успешно вошли в свою учетную запись<span> ". $user['login']."</span>";
        echo "<br>Скоро вы будете перенаправлены на страницу с клиентами";
        echo "<br>Если этого не произошло нажмите <a href='index.php'>здесь</a></h3></div>";
        header("Refresh:7; url=index.php");
        exit;
    } else {
        echo '<div class="message"><h3 style="color: red;">Неверный логин или пароль</h3></div>';
        header("Refresh:5; url=index.php");
        exit;
    }
}

?>