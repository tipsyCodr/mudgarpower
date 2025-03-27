<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Add New Course
            <small>Add a new course to your website</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="course_manage.php">Courses</a></li>
            <li class="active">Add New Course</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Course</h3>
                    </div>
                    <form role="form" action="add_course_do.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" id="price" name="price" 
                                           step="0.01" min="0" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="duration">Course Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration" 
                                       placeholder="e.g., 8 weeks, Self-paced">
                            </div>
                            
                            <div class="form-group">
                                <label for="certificate">Certificate Information</label>
                                <input type="text" class="form-control" id="certificate" name="certificate" 
                                       placeholder="e.g., Certificate upon completion">
                            </div>
                            
                            <div class="form-group">
                                <label for="access_type">Access Type</label>
                                <input type="text" class="form-control" id="access_type" name="access_type" 
                                       placeholder="e.g., Online access, Lifetime access">
                            </div>
                            
                            <div class="form-group">
                                <label for="support_type">Support Type</label>
                                <input type="text" class="form-control" id="support_type" name="support_type" 
                                       placeholder="e.g., Community support, Email support">
                            </div>
                            
                            <div class="form-group">
                                <label for="learning_outcomes">What You'll Learn</label>
                                <textarea class="form-control" id="learning_outcomes" name="learning_outcomes" 
                                          rows="5" placeholder="Enter learning outcomes, one per line"></textarea>
                                <small class="form-text text-muted">Enter each learning outcome on a new line</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Course Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <p class="help-block">Recommended size: 800x450 pixels</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add Course</button>
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