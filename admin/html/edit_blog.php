<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
include_once('../../root/db_connection.php');

if (!isset($_GET['id'])) {
    header("Location: blog_manage.php");
    exit();
}

$id = (int)$_GET['id'];
$query = "SELECT * FROM blog_posts WHERE id = $id";
$result = $db->query($query);

if ($result->rowCount() == 0) {
    header("Location: blog_manage.php");
    exit();
}

$post = $result->fetch(PDO::FETCH_ASSOC);
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Edit Blog Post
            <small>Modify existing blog post</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="blog_manage.php">Blog Management</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Blog Post</h3>
                    </div>
                    <form role="form" action="edit_blog_do.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($post['author']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <?php if ($post['featured_image']): ?>
                                    <div class="current-image">
                                        <img src="../../<?php echo $post['featured_image']; ?>" alt="Current featured image" style="max-width: 200px; margin-bottom: 10px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                                <p class="help-block">Leave empty to keep current image</p>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" name="content" class="form-control" rows="10"><?php echo $post['content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php echo $post['status'] == 1 ? 'selected' : ''; ?>>Published</option>
                                    <option value="0" <?php echo $post['status'] == 0 ? 'selected' : ''; ?>>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                            <a href="blog_manage.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
tinymce.init({
    selector: '#content',
    height: 400,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | bold italic backcolor | \
        alignleft aligncenter alignright alignjustify | \
        bullist numlist outdent indent | removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<?php include_once('admin_footer.php'); ?> 