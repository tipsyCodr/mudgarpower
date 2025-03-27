<?php
require_once('root/db_connection.php');

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Video ID is required']);
    exit();
}

$video_id = $_GET['id'];

$query = "SELECT * FROM video_gallery WHERE id = :id AND status = 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $video_id);
$stmt->execute();
$video = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$video) {
    http_response_code(404);
    echo json_encode(['error' => 'Video not found']);
    exit();
}

// Return video details
echo json_encode([
    'id' => $video['id'],
    'title' => $video['title'],
    'description' => $video['description'],
    'video_url' => $video['video_url'],
    'local_video' => $video['local_video'],
    'video_type' => $video['video_type'],
    'thumbnail' => $video['thumbnail'],
    'category' => $video['category']
]); 