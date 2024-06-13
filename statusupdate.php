<?php
session_start();
require_once 'config.php';
echo "<link rel='stylesheet' href='style.css'>";
echo "<title>Изменение статуса</title>";
$new_status = $_POST['new_status'];
$id = $_POST['id'];
if ($new_status) {
    $stmt = $db->prepare("UPDATE Clients SET status = :new_status WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":new_status", $new_status);

    $stmt->execute();

    echo "<div class='message'><h3>Поздравляю <span>" . $_SESSION['fio'] . ".</span><br>Вы успешно поменяли статус записи №: <span> " . $id . "</span>. <br>Новый статус записи: <span>" . $new_status;
    echo "</span><br>Скоро вы будете перенаправлены на страницу с клиентами";
    echo "<br>Если этого не произошло нажмите <a href='index.php'>здесь</a></h3></div>";
    header("Refresh:7; url=index.php");
}
