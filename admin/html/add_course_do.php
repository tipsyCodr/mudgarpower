<?php
require_once('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];
    $duration = $_POST['duration'];
    $certificate = $_POST['certificate'];
    $access_type = $_POST['access_type'];
    $support_type = $_POST['support_type'];
    $learning_outcomes = $_POST['learning_outcomes'];
    $status = (int)$_POST['status'];
    $created_at = date('Y-m-d H:i:s');
    
    // Handle image upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../../uploads/courses/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
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
    
    // Insert into database using PDO
    $query = "INSERT INTO courses (name, description, price, image, duration, certificate, access_type, 
              support_type, learning_outcomes, status, created_at) 
              VALUES (:name, :description, :price, :image, :duration, :certificate, :access_type, 
              :support_type, :learning_outcomes, :status, :created_at)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':certificate', $certificate);
    $stmt->bindParam(':access_type', $access_type);
    $stmt->bindParam(':support_type', $support_type);
    $stmt->bindParam(':learning_outcomes', $learning_outcomes);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $created_at);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Course added successfully!');
                window.location.href = 'course_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error adding course: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'add_course.php';
              </script>";
    }
} else {
    header("Location: course_manage.php");
} 