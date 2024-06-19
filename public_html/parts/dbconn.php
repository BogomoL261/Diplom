<?php
$servername = "localhost";
$database = "ykhoroltso_conf";
$username = "ykhoroltso_conf";
$password = "Jaf42317";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";






?>