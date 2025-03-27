<?php
require_once('../../root/db_connection.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Get thumbnail path before deleting
    $query = "SELECT thumbnail FROM video_gallery WHERE id = $id";
    $result = $db->query($query);
    $video = $result->fetch(PDO::FETCH_ASSOC);
    
    // Delete the video
    $query = "DELETE FROM video_gallery WHERE id = $id";
    
    if ($db->query($query)) {
        // Delete thumbnail if exists
        if ($video['thumbnail'] && file_exists("../../" . $video['thumbnail'])) {
            unlink("../../" . $video['thumbnail']);
        }
        
        echo "<script>
                alert('Video deleted successfully!');
                window.location.href = 'video_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting video: " . $db->error . "');
                window.location.href = 'video_manage.php';
              </script>";
    }
} else {
    header("Location: video_manage.php");
} 