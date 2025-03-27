<?php
require_once('root/db_connection.php');
include_once('partials/head.php');

if (!isset($_GET['id'])) {
    header("Location: blog.php");
    exit();
}

$id = (int)$_GET['id'];
$query = "SELECT * FROM blog_posts WHERE id = $id AND status = 1";
$result = $db->query($query);

if ($result->rowCount() == 0) {
    header("Location: blog.php");
    exit();
}

    $post = $result->fetch(PDO::FETCH_ASSOC);
?>

<div class="container" style="padding-top: 200px; padding-bottom: 100px;">
    <div class="row">
        <div class="col-md-8">
            <article class="single-post">
                <?php if ($post['featured_image']): ?>
                    <div class="featured-image">
                        <img src="<?php echo $post['featured_image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-responsive">
                    </div>
                <?php endif; ?>
                
                <div class="post-content">
                    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
                    <div class="post-meta">
                        <span class="author">By <?php echo htmlspecialchars($post['author']); ?></span>
                        <span class="date"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                    </div>
                    <div class="post-body">
                        <?php echo $post['content']; ?>
                    </div>
                </div>
            </article>
        </div>
        
        <div class="col-md-4">
            <div class="sidebar">
                <div class="widget">
                    <h3>Recent Posts</h3>
                    <ul class="recent-posts">
                        <?php
                        $query = "SELECT id, title, created_at FROM blog_posts WHERE status = 1 AND id != $id ORDER BY created_at DESC LIMIT 5";
                        $result = $db->query($query);
                        
                        while ($recent_post = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li><a href='blog-single.php?id=" . $recent_post['id'] . "'>" . htmlspecialchars($recent_post['title']) . "</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                
                <div class="widget">
                    <h3>Categories</h3>
                    <ul class="categories">
                        <?php
                        $query = "SELECT DISTINCT category FROM blog_posts WHERE status = 1 AND category IS NOT NULL";
                        $result = $db->query($query);
                        
                        while ($category = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li><a href='blog.php?category=" . urlencode($category['category']) . "'>" . htmlspecialchars($category['category']) . "</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.single-post {
    margin-top: 30px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

.post-content {
    padding: 30px;
}

.post-content h1 {
    margin: 0 0 15px;
    font-size: 32px;
    color: #333;
}

.post-meta {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
}

.post-meta span {
    margin-right: 15px;
}

.post-body {
    color: #333;
    line-height: 1.8;
    font-size: 16px;
}

.post-body p {
    margin-bottom: 20px;
}

.post-body img {
    max-width: 100%;
    height: auto;
    margin: 20px 0;
}

.sidebar {
    margin-top: 30px;
}

.widget {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.widget h3 {
    margin: 0 0 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #eee;
}

.recent-posts, .categories {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recent-posts li, .categories li {
    margin-bottom: 10px;
}

.recent-posts a, .categories a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s;
}

.recent-posts a:hover, .categories a:hover {
    color: #007bff;
}
</style>

<?php include_once('partials/footer.php'); ?> 