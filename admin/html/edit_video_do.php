<?php
require_once('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_type = $_POST['video_type'];
    $category = $_POST['category'];
    $status = (int)$_POST['status'];
    
    // Get current video data
    $query = "SELECT * FROM video_gallery WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $current_video = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Handle video upload based on type
    $video_url = $current_video['video_url'];
    $local_video = $current_video['local_video'];
    
    if ($video_type === 'embedded') {
        $video_url = $_POST['video_url'];
        // If switching from local to embedded, delete the local video file
        if ($current_video['video_type'] === 'local' && $current_video['local_video']) {
            $local_file = "../../" . $current_video['local_video'];
            if (file_exists($local_file)) {
                unlink($local_file);
            }
            $local_video = '';
        }
    } else {
        if (isset($_FILES['local_video']) && $_FILES['local_video']['error'] == 0) {
            $target_dir = "../../uploads/videos/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $file_extension = strtolower(pathinfo($_FILES["local_video"]["name"], PATHINFO_EXTENSION));
            $allowed_extensions = array('mp4', 'webm', 'ogg');
            
            if (in_array($file_extension, $allowed_extensions)) {
                // Delete old local video file if exists
                if ($current_video['local_video']) {
                    $old_file = "../../" . $current_video['local_video'];
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
                
                $new_filename = uniqid() . '.' . $file_extension;
                $target_file = $target_dir . $new_filename;
                
                if (move_uploaded_file($_FILES["local_video"]["tmp_name"], $target_file)) {
                    $local_video = 'uploads/videos/' . $new_filename;
                }
            }
        }
        // If switching from embedded to local but no new file uploaded, keep the existing local video
    }
    
    // Handle thumbnail upload
    $thumbnail = $current_video['thumbnail'];
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../uploads/videos/thumbnails/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Delete old thumbnail if exists
        if ($current_video['thumbnail']) {
            $old_thumbnail = "../../" . $current_video['thumbnail'];
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
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
    
    // Update database using PDO
    $query = "UPDATE video_gallery SET 
              title = :title,
              description = :description,
              video_url = :video_url,
              local_video = :local_video,
              video_type = :video_type,
              thumbnail = :thumbnail,
              category = :category,
              status = :status
              WHERE id = :id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':video_url', $video_url);
    $stmt->bindParam(':local_video', $local_video);
    $stmt->bindParam(':video_type', $video_type);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Video updated successfully!');
                window.location.href = 'video_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating video: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'edit_video.php?id=" . $id . "';
              </script>";
    }
} else {
    header("Location: video_manage.php");
} 