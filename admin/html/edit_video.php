<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
require_once('../../root/db_connection.php');

if (!isset($_GET['id'])) {
    header("Location: video_manage.php");
    exit();
}

$video_id = $_GET['id'];
$query = "SELECT * FROM video_gallery WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $video_id);
$stmt->execute();
$video = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$video) {
    header("Location: video_manage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Video</h2>
        <form action="edit_video_do.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($video['title']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($video['description']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="video_type">Video Type</label>
                <select class="form-control" id="video_type" name="video_type" required>
                    <option value="embedded" <?php echo $video['video_type'] === 'embedded' ? 'selected' : ''; ?>>Embedded Video (YouTube/Vimeo)</option>
                    <option value="local" <?php echo $video['video_type'] === 'local' ? 'selected' : ''; ?>>Local Video File</option>
                </select>
            </div>
            
            <div class="form-group" id="embedded_video_group" style="display: <?php echo $video['video_type'] === 'embedded' ? 'block' : 'none'; ?>">
                <label for="video_url">Video URL (YouTube/Vimeo)</label>
                <input type="url" class="form-control" id="video_url" name="video_url" value="<?php echo htmlspecialchars($video['video_url']); ?>">
                <small class="form-text text-muted">Enter the YouTube or Vimeo video URL</small>
            </div>
            
            <div class="form-group" id="local_video_group" style="display: <?php echo $video['video_type'] === 'local' ? 'block' : 'none'; ?>">
                <label for="local_video">Local Video File</label>
                <input type="file" class="form-control-file" id="local_video" name="local_video" accept="video/mp4,video/webm,video/ogg">
                <small class="form-text text-muted">Supported formats: MP4, WebM, Ogg (Max size: 100MB)</small>
                <?php if ($video['local_video']): ?>
                    <div class="mt-2">
                        <p>Current video: <?php echo htmlspecialchars($video['local_video']); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*">
                <?php if ($video['thumbnail']): ?>
                    <div class="mt-2">
                        <img src="../../<?php echo htmlspecialchars($video['thumbnail']); ?>" alt="Current thumbnail" style="max-width: 200px;">
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($video['category']); ?>">
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" <?php echo $video['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo $video['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Video</button>
            <a href="video_manage.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#video_type').change(function() {
                if ($(this).val() === 'embedded') {
                    $('#embedded_video_group').show();
                    $('#local_video_group').hide();
                } else {
                    $('#embedded_video_group').hide();
                    $('#local_video_group').show();
                }
            });
        });
    </script>
</body>
</html>

<?php include_once('admin_footer.php'); ?> 