<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
require_once('../../root/db_connection.php');

// Get all courses
$query = "SELECT * FROM courses ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Course Management
            <small>Manage your courses</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Courses</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Course List</h3>
                        <div class="box-tools">
                            <a href="add_course.php" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Add New Course
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($courses as $course): ?>
                                        <tr>
                                            <td><?php echo $course['id']; ?></td>
                                            <td>
                                                <?php if ($course['image']): ?>
                                                    <img src="../../<?php echo htmlspecialchars($course['image']); ?>" 
                                                         alt="<?php echo htmlspecialchars($course['name']); ?>" 
                                                         style="max-width: 100px;">
                                                <?php else: ?>
                                                    <span class="text-muted">No image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($course['name']); ?></td>
                                            <td>$<?php echo number_format($course['price'], 2); ?></td>
                                            <td>
                                                <span class="label label-<?php echo $course['status'] ? 'success' : 'danger'; ?>">
                                                    <?php echo $course['status'] ? 'Active' : 'Inactive'; ?>
                                                </span>
                                            </td>
                                            <td><?php echo date('Y-m-d H:i', strtotime($course['created_at'])); ?></td>
                                            <td>
                                                <a href="edit_course.php?id=<?php echo $course['id']; ?>" 
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="delete_course.php?id=<?php echo $course['id']; ?>" 
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Are you sure you want to delete this course?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once('admin_footer.php'); ?> 