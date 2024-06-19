<?php

session_start();
$to = "n.bokoveev@gmail.com";
$tema = "Заказ с сайта";

$message .= "Имя пользователя: ".$_SESSION['uname']."<br>";

$message .= "E-mail: ".$_SESSION['email']."<br>";

$message .= "Артикул: ".$_POST['model']."<br>";

$message .= "Количество: ".$_POST['qte']."<br>";

$message .= "Ориентировочная стоимость: ".$_POST['summa']."<br>";

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

mail($to, $tema, $message, $headers);

$redir = 'http://config.masseftech.com/configpage.php';
header('Location: '.$redir);

?>