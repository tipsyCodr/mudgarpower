<?php
require_once('../../root/db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Get course data to delete image
    $query = "SELECT image FROM courses WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Delete course image if exists
    if ($course && $course['image']) {
        $image_path = "../../" . $course['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
    
    // Delete course from database
    $query = "DELETE FROM courses WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Course deleted successfully!');
                window.location.href = 'course_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting course: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'course_manage.php';
              </script>";
    }
} else {
    header("Location: course_manage.php");
} 