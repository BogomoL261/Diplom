<?php
session_start();
unset($_SESSION[name]);
session_destroy();
header('Location: http://config.masseftech.com');
?>