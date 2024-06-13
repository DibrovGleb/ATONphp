<?php
session_start();
require_once 'config.php';

$user_id = $_SESSION['id'];

$sql = "SELECT * FROM Clients WHERE responsible_user_id = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$clients = $stmt->fetchAll();
if ($clients) {
    echo "<div class='tbl_container'><h2>Клиенты</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Номер счета</th><th>Фамилия</th>
    <th>Имя</th><th>Отчество</th><th>ИНН</th>
    <th>Статус</th></tr>";
    foreach ($clients as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td class='acc-num'>" . $row['account_number'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['middle_name'] . "</td>";
        echo "<td>" . $row['inn'] . "</td>";
        echo '<td><form action="statusupdate.php" method="PUT">
                <select name="new_status">
                <option value="" selected disabled hidden>'.$row['status'].'</option>
                <option value="Не в работе">Не в работе</option>
                <option value="В работе">В работе</option>
                <option value="Отказ">Отказ</option>
                <option value="Сделка закрыта">Сделка закрыта</option>
                </select>
                <input type="hidden" name="id" value='. $row['id'] .'>
                <button type="submit">Обновить</button>
                </form></td>';
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo '<h2>У вас нет клиентов<h2>';
}
?>