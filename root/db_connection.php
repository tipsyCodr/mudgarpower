<?php
$user = ini_get('user');
$pass = ini_get('pass');
$db = ini_get('dbname');

$db = new PDO('mysql:host=127.0.0.1;dbname=' . $dbname . ';charset=utf8mb4', $user, $pass);
?>