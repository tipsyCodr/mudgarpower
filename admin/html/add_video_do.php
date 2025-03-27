<?php
require_once('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_type = $_POST['video_type'];
    $category = $_POST['category'];
    $status = (int)$_POST['status'];
    $created_at = date('Y-m-d H:i:s');
    
    // Handle video upload based on type
    $video_url = '';
    $local_video = '';
    
    if ($video_type === 'embedded') {
        $video_url = $_POST['video_url'];
    } else {
        if (isset($_FILES['local_video']) && $_FILES['local_video']['error'] == 0) {
            $target_dir = "../../uploads/videos/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $file_extension = strtolower(pathinfo($_FILES["local_video"]["name"], PATHINFO_EXTENSION));
            $allowed_extensions = array('mp4', 'webm', 'ogg');
            
            if (in_array($file_extension, $allowed_extensions)) {
                $new_filename = uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $new_filename;
                
                if (move_uploaded_file($_FILES["local_video"]["tmp_name"], $target_file)) {
                    $local_video = 'uploads/videos/' . $new_filename;
                }
            }
        }
    }
    
    // Handle thumbnail upload
    $thumbnail = '';
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../uploads/videos/thumbnails/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Check if image file is actual image or fake image
        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = 'uploads/videos/thumbnails/' . $new_filename;
            }
        }
    }
    
    // Insert into database using PDO
    $query = "INSERT INTO video_gallery (title, description, video_url, local_video, video_type, thumbnail, category, status, created_at) 
              VALUES (:title, :description, :video_url, :local_video, :video_type, :thumbnail, :category, :status, :created_at)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':video_url', $video_url);
    $stmt->bindParam(':local_video', $local_video);
    $stmt->bindParam(':video_type', $video_type);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $created_at);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Video added successfully!');
                window.location.href = 'video_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error adding video: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'add_video.php';
              </script>";
    }
} else {
    header("Location: video_manage.php");
} 