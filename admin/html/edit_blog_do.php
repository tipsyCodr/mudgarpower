<?php
include_once('../../root/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];
    $title = $_POST['title']; // Removed quoting to prevent SQL syntax issues
    $author = $_POST['author']; // Removed quoting to prevent SQL syntax issues
    $content = $_POST['content']; // Removed quoting to prevent SQL syntax issues
    $status = (int)$_POST['status'];
    
    // Get current featured image
    $query = "SELECT featured_image FROM blog_posts WHERE id = $id";
    $result = $db->query($query);
    $post = $result->fetch(PDO::FETCH_ASSOC);
    $featured_image = $post['featured_image'];
    
    // Handle new featured image upload
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
                // Delete old image if exists
                if ($featured_image && file_exists("../../" . $featured_image)) {
                    unlink("../../" . $featured_image);
                }
                $featured_image = 'uploads/blog/' . $new_filename;
            }
        }
    }
    
    // Update database
    $query = "UPDATE blog_posts SET 
              title = :title,
              author = :author,
              content = :content,
              featured_image = :featured_image,
              status = :status
              WHERE id = :id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':featured_image', $featured_image);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Blog post updated successfully!');
                window.location.href = 'blog_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating blog post: " . $db->error . "');
                window.location.href = 'edit_blog.php?id=" . $id . "';
              </script>";
    }
} else {
    header("Location: blog_manage.php");
}