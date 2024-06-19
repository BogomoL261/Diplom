<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    } else {
	header('Location: http://config.masseftech.com/configpage.php');
    }
?>