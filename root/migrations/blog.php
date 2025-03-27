<?php

// Create blog_posts table migration


try {
    // Create a new PDO instance
    // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    require_once('../db_connection.php');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS `blog_posts` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `author` varchar(100) NOT NULL,
        `content` text NOT NULL,
        `featured_image` varchar(255) DEFAULT NULL,
        `category` varchar(100) DEFAULT NULL,
        `status` tinyint(1) NOT NULL DEFAULT '1',
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Execute the SQL statement
    $db->exec($sql);
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

?>
