<?php
session_start();
require_once 'config.php';
echo "<link rel='stylesheet' href='style.css'>";
echo "<title>Все клиенты</title>";

$sql = "SELECT * FROM Clients";
$stmt = $db->prepare($sql);
$stmt->execute();

$clients = $stmt->fetchAll();
if ($clients) {
    echo "<a class='btn-link' href='index.php'>Вернуться на главную</a>";
    echo "<div class='tbl_container'><h2>Клиенты</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Номер счета</th><th>Фамилия</th>
    <th>Имя</th><th>Отчество</th><th>ИНН</th>
    <th>Статус</th></tr>";
    foreach ($clients as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['account_number'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['middle_name'] . "</td>";
        echo "<td>" . $row['inn'] . "</td>";
        echo '<td>'.$row['status'].'</option></td>';
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo '<h2>В базе данных нет клиентов<h2>';
}
?>