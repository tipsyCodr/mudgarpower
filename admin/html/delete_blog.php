<?php
include_once('../../root/db_connection.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Get featured image path before deleting
    $query = "SELECT featured_image FROM blog_posts WHERE id = $id";
    $result = $db->query($query);
    $post = $result->fetch(PDO::FETCH_ASSOC);
    
    // Delete the post
    $query = "DELETE FROM blog_posts WHERE id = $id";
    
    if ($db->query($query)) {
        // Delete featured image if exists
        if ($post['featured_image'] && file_exists("../../" . $post['featured_image'])) {
            unlink("../../" . $post['featured_image']);
        }
        
        echo "<script>
                alert('Blog post deleted successfully!');
                window.location.href = 'blog_manage.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting blog post: " . $db->error . "');
                window.location.href = 'blog_manage.php';
              </script>";
    }
} else {
    header("Location: blog_manage.php");
}
?> 