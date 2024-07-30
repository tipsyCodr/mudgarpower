<?php
if (!isset($_COOKIE['login'])) {
    header("location:../index.php");
    die();
}

?>

<?php include ('./admin_header.php'); ?>

<!-- Main Wrapper -->
<div id="main-wrapper">
    <!-- Sidebar -->
    <?php include ('./admin_left_sidebar.php'); ?>

    <!-- Page Content -->
    <div class="page-wrapper">

        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title m-0">Manage Sliders</h4>
                        <a href="add_slider.php" class="btn btn-primary btn-sm">Create Slider</a>
                    </div>
                </div>
                <div class="card-body p-5 table-responsive">
                    <table class="table table-striped table-bordered" id="slider_table">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once ('../../root/db_connection.php');
                            $query = "SELECT * FROM `contact_information` ORDER BY `id` DESC";
                            $result = $db->query($query) or die('');
                            $sno = 1;
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $sno++; ?></td>
                                    <td><?php echo $row['contact_name']; ?></td>
                                    <td><?php echo $row['contact_phone']; ?></td>
                                    <td><?php echo $row['contact_email']; ?></td>
                                    <td><?php echo $row['contact_message']; ?></td>
                                    <!-- <td>
                                            <a href="add_slider_edit.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="add_slider_delete.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td> -->
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include ('./admin_footer.php'); ?>
</div>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#slider_table').DataTable({
            responsive: true,
            paging: true,
            pageLength: 5,
            responsive: true
        });



    });


</script>