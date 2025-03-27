<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Blog Management
            <small>Manage your blog posts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog Management</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Blog Posts</h3>
                        <div class="box-tools">
                            <a href="add_blog.php" class="btn btn-primary">Add New Post</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="blogTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('../../root/db_connection.php');
                                $query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
                                $result = $db->query($query);
                                
                                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['title']."</td>";
                                    echo "<td>".$row['author']."</td>";
                                    echo "<td>".date('M d, Y', strtotime($row['created_at']))."</td>";
                                    echo "<td>".($row['status'] == 1 ? '<span class="label label-success">Published</span>' : '<span class="label label-warning">Draft</span>')."</td>";
                                    echo "<td>
                                            <a href='edit_blog.php?id=".$row['id']."' class='btn btn-sm btn-info'><i class='fa fa-edit'></i></a>
                                            <a href='delete_blog.php?id=".$row['id']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this post?\")'><i class='fa fa-trash'></i></a>
                                          </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('#blogTable').DataTable();
});
</script>

<?php include_once('admin_footer.php'); ?> 