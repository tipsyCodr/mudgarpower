<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
require_once('../../root/db_connection.php');

if (!isset($_GET['id'])) {
    header("Location: course_manage.php");
    exit();
}

$course_id = $_GET['id'];
$query = "SELECT * FROM courses WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $course_id);
$stmt->execute();
$course = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$course) {
    header("Location: course_manage.php");
    exit();
}
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Edit Course
            <small>Modify course details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="course_manage.php">Courses</a></li>
            <li class="active">Edit Course</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Course</h3>
                    </div>
                    <form role="form" action="edit_course_do.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
                        
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?php echo htmlspecialchars($course['name']); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" 
                                          rows="10"><?php echo htmlspecialchars($course['description']); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" id="price" name="price" 
                                           step="0.01" min="0" value="<?php echo $course['price']; ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="duration">Course Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration" 
                                       value="<?php echo htmlspecialchars($course['duration']); ?>"
                                       placeholder="e.g., 8 weeks, Self-paced">
                            </div>
                            
                            <div class="form-group">
                                <label for="certificate">Certificate Information</label>
                                <input type="text" class="form-control" id="certificate" name="certificate" 
                                       value="<?php echo htmlspecialchars($course['certificate']); ?>"
                                       placeholder="e.g., Certificate upon completion">
                            </div>
                            
                            <div class="form-group">
                                <label for="access_type">Access Type</label>
                                <input type="text" class="form-control" id="access_type" name="access_type" 
                                       value="<?php echo htmlspecialchars($course['access_type']); ?>"
                                       placeholder="e.g., Online access, Lifetime access">
                            </div>
                            
                            <div class="form-group">
                                <label for="support_type">Support Type</label>
                                <input type="text" class="form-control" id="support_type" name="support_type" 
                                       value="<?php echo htmlspecialchars($course['support_type']); ?>"
                                       placeholder="e.g., Community support, Email support">
                            </div>
                            
                            <div class="form-group">
                                <label for="learning_outcomes">What You'll Learn</label>
                                <textarea class="form-control" id="learning_outcomes" name="learning_outcomes" 
                                          rows="5" placeholder="Enter learning outcomes, one per line"><?php echo htmlspecialchars($course['learning_outcomes']); ?></textarea>
                                <small class="form-text text-muted">Enter each learning outcome on a new line</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Course Image</label>
                                <?php if ($course['image']): ?>
                                    <div class="current-image">
                                        <img src="../../<?php echo htmlspecialchars($course['image']); ?>" 
                                             alt="Current course image" style="max-width: 200px; margin-bottom: 10px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <p class="help-block">Leave empty to keep current image. Recommended size: 800x450 pixels</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php echo $course['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo $course['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update Course</button>
                            <a href="course_manage.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#description',
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