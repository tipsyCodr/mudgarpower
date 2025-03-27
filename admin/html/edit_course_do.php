<?php
require_once('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];
    $status = (int)$_POST['status'];
    
    // Get current course data
    $query = "SELECT * FROM courses WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $current_course = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Handle image upload
    $image = $current_course['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../../uploads/courses/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Delete old image if exists
        if ($current_course['image']) {
            $old_image = "../../" . $current_course['image'];
            if (file_exists($old_image)) {
                unlink($old_image);
            }
        }
        
        $file_extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Check if image file is actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = 'uploads/courses/' . $new_filename;
            }
        }
    }
    
    // Update database using PDO
    $query = "UPDATE courses SET 
              name = :name,
              description = :description,
              price = :price,
              image = :image,
              status = :status
              WHERE id = :id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Course updated successfully!');
                window.location.href = 'course_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating course: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'edit_course.php?id=" . $id . "';
              </script>";
    }
} else {
    header("Location: course_manage.php");
} 