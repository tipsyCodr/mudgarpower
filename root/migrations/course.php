<?php
try {
    require_once('../../root/db_connection.php');
    // $db = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE TABLE IF NOT EXISTS `courses` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `description` text,
      `price` decimal(10,2) NOT NULL,
      `image` varchar(255) DEFAULT NULL,
      `duration` varchar(100) DEFAULT NULL,
      `certificate` varchar(255) DEFAULT NULL,
      `access_type` varchar(100) DEFAULT NULL,
      `support_type` varchar(100) DEFAULT NULL,
      `learning_outcomes` text,
      `status` tinyint(1) NOT NULL DEFAULT '1',
      `created_at` datetime NOT NULL,
      `updated_at` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $db->exec($sql);
    echo "Table 'courses' created successfully.";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
$db = null;
