<?php
    define('USER', 'ykhoroltso_conf');
    define('PASSWORD', 'Jaf42317');
    define('HOST', 'localhost');
    define('DATABASE', 'ykhoroltso_conf');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>