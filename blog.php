<?php
include_once('partials/head.php');
require_once('root/db_connection.php');
?>

<div class="container" style="padding-top: 200px; padding-bottom: 100px;">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-posts">
                <?php
                $query = "SELECT * FROM blog_posts WHERE status = 1 ORDER BY created_at DESC";
                $result = $db->query($query);
                
                while ($post = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <article class="blog-post">
                        <?php if ($post['featured_image']): ?>
                            <div class="featured-image">
                                <img src="<?php echo $post['featured_image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="img-responsive">
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h2><a href="blog-single.php?id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
                            <div class="post-meta">
                                <span class="author">By <?php echo htmlspecialchars($post['author']); ?></span>
                                <span class="date"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php 
                                $excerpt = strip_tags($post['content']);
                                echo substr($excerpt, 0, 200) . '...';
                                ?>
                            </div>
                            <a href="blog-single.php?id=<?php echo $post['id']; ?>" class="read-more">Read More</a>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="sidebar">
                <div class="widget">
                    <h3>Recent Posts</h3>
                    <ul class="recent-posts">
                        <?php
                        $query = "SELECT id, title, created_at FROM blog_posts WHERE status = 1 ORDER BY created_at DESC LIMIT 5";
                        $result = $db->query($query);
                        
                        while ($post = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<li><a href='blog-single.php?id=" . $post['id'] . "'>" . htmlspecialchars($post['title']) . "</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                
                <!-- <div class="widget">
                    <h3>Categories</h3>
                    <ul class="categories">
                        <?php
                        // $query = "SELECT DISTINCT category FROM blog_posts WHERE status = 1 AND category IS NOT NULL";
                        // $result = $db->query($query);
                        
                        // while ($category = $result->fetch(PDO::FETCH_ASSOC)) {
                        //     echo "<li><a href='blog.php?category=" . urlencode($category['category']) . "'>" . htmlspecialchars($category['category']) . "</a></li>";
                        // }
                        ?>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</div>

<style>
.blog-posts {
    margin-top: 30px;
}

.blog-post {
    margin-bottom: 40px;
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
    padding: 20px;
}

.post-content h2 {
    margin: 0 0 10px;
    font-size: 24px;
}

.post-content h2 a {
    color: #333;
    text-decoration: none;
}

.post-meta {
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
}

.post-meta span {
    margin-right: 15px;
}

.post-excerpt {
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.read-more {
    display: inline-block;
    padding: 8px 20px;
    background: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 3px;
    transition: background 0.3s;
}

.read-more:hover {
    background: #0056b3;
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