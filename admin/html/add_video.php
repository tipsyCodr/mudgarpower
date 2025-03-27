<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Add New Video
            <small>Add a new video to the gallery</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="video_manage.php">Video Gallery</a></li>
            <li class="active">Add New Video</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Video</h3>
                    </div>
                    <form role="form" action="add_video_do.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Video Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="video_type">Video Type</label>
                                <select class="form-control" id="video_type" name="video_type" required>
                                    <option value="embedded">Embedded Video (YouTube/Vimeo)</option>
                                    <option value="local">Local Video File</option>
                                </select>
                            </div>
                            <div class="form-group embedded-video">
                                <label for="video_url">Video URL</label>
                                <input type="url" class="form-control" id="video_url" name="video_url">
                                <p class="help-block">Enter YouTube or Vimeo video URL</p>
                            </div>
                            <div class="form-group local-video" style="display: none;">
                                <label for="local_video">Video File</label>
                                <input type="file" class="form-control" id="local_video" name="local_video" accept="video/*">
                                <p class="help-block">Supported formats: MP4, WebM, Ogg. Maximum file size: 100MB</p>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail Image</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                                <p class="help-block">Recommended size: 800x450 pixels</p>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category">
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
                            <button type="submit" class="btn btn-primary">Add Video</button>
                            <a href="video_manage.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('video_type').addEventListener('change', function() {
        if (this.value === 'embedded') {
            document.querySelector('.embedded-video').style.display = 'block';
            document.querySelector('.local-video').style.display = 'none';
            document.getElementById('video_url').required = true;
            document.getElementById('local_video').required = false;
        } else {
            document.querySelector('.embedded-video').style.display = 'none';
            document.querySelector('.local-video').style.display = 'block';
            document.getElementById('video_url').required = false;
            document.getElementById('local_video').required = true;
        }
    });
});
</script>

<?php include_once('admin_footer.php'); ?> 