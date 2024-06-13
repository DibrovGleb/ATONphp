<?php
session_start();
echo "<link rel='stylesheet' href='style.css'>";
echo "<title>Выход</title>";
echo "<div class='message'><h3><span>" .$_SESSION['fio'] ."</span> вы вышли из учетной записи.<br>";
echo "Скоро вы будете перенаправлены на главную страницу";
echo "<br>Если этого не произошло нажмите <a href='index.php'>здесь</a></h3></div>";
session_destroy();
header("Refresh:5; url=index.php");
?>