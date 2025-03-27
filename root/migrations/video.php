<?php
require_once('../../root/db_connection.php');
$query = "CREATE TABLE IF NOT EXISTS `video_gallery` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text,
    `video_url` varchar(255) DEFAULT NULL,
    `local_video` varchar(255) DEFAULT NULL,
    `video_type` enum('embedded','local') NOT NULL DEFAULT 'embedded',
    `thumbnail` varchar(255) DEFAULT NULL,
    `category` varchar(100) DEFAULT NULL,
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `created_at` datetime NOT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

try {
    $db->exec($query);
    echo "Table video_gallery created successfully.";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?>

