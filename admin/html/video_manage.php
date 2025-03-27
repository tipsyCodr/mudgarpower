<?php
include_once('admin_header.php');
include_once('admin_left_sidebar.php');
?>

<div class="page-wrapper">
    <section class="content-header">
        <h1>
            Video Gallery Management
            <small>Manage your video gallery</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Video Gallery</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Video Gallery</h3>
                        <div class="box-tools">
                            <a href="add_video.php" class="btn btn-primary">Add New Video</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="videoTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thumbnail</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('../../root/db_connection.php');
                                $query = "SELECT * FROM video_gallery ORDER BY created_at DESC";
                                $result = $db->query($query);
                                
                                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>";
                                    if ($row['thumbnail']) {
                                        echo "<img src='../../".$row['thumbnail']."' alt='Thumbnail' style='max-width: 100px;'>";
                                    }
                                    echo "</td>";
                                    echo "<td>".$row['title']."</td>";
                                    echo "<td>".$row['category']."</td>";
                                    echo "<td>".date('M d, Y', strtotime($row['created_at']))."</td>";
                                    echo "<td>".($row['status'] == 1 ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>')."</td>";
                                    echo "<td>
                                            <a href='edit_video.php?id=".$row['id']."' class='btn btn-sm btn-info'><i class='fa fa-edit'></i></a>
                                            <a href='delete_video.php?id=".$row['id']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this video?\")'><i class='fa fa-trash'></i></a>
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
    $('#videoTable').DataTable();
});
</script>

<?php include_once('admin_footer.php'); ?> 