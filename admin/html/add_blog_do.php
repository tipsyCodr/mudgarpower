<?php
require_once ('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $status = (int)$_POST['status'];
    $created_at = date('Y-m-d H:i:s');
    
    // Handle featured image upload
    $featured_image = '';
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $target_dir = "../../uploads/blog/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES["featured_image"]["name"], PATHINFO_EXTENSION));
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Check if image file is actual image or fake image
        $check = getimagesize($_FILES["featured_image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file)) {
                $featured_image = 'uploads/blog/' . $new_filename;
            }
        }
    }
    
    // Insert into database using PDO
    $query = "INSERT INTO blog_posts (title, author, content, featured_image, status, created_at) 
              VALUES (:title, :author, :content, :featured_image, :status, :created_at)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':featured_image', $featured_image);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':created_at', $created_at);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Blog post added successfully!');
                window.location.href = 'blog_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error adding blog post: " . implode(", ", $stmt->errorInfo()) . "');
                window.location.href = 'add_blog.php';
              </script>";
    }
} else {
    header("Location: blog_manage.php");
}