<?php
$config = parse_ini_file('config.ini', true);
$host = $config['database']['host'];
$user = $config['database']['username'];
$pass = $config['database']['password'];
$dbname = $config['database']['dbname'];

$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8mb4', $user, $pass);
?>