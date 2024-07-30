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
                    <table id="slider_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once ('../../root/db_connection.php');
                            $query = "SELECT * FROM `slide_information` ORDER BY `slide_id` DESC";
                            $result = $db->query($query) or die('');
                            $sno = 1;
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $sno++; ?></td>
                                    <td><?php echo $row['slide_title']; ?></td>
                                    <td><?php echo $row['slide_subtitle']; ?></td>
                                    <td><img src="<?php echo "./uploads/slider_images/" . $row['slide_image']; ?>"
                                            width="100" height="100" alt="">
                                    </td>
                                    <td>

                                        <a href="add_slider_edit.php?id=<?php echo $row['slide_id']; ?>"
                                            class="btn btn-primary btn-sm mb-1">
                                            <i class="fas fa-edit"></i> Edit
                                        </a><br/>
                                        <a href="add_slider_delete.php?id=<?php echo $row['slide_id']; ?>"
                                            class="btn btn-danger btn-sm mt-1 "> <i class="fas fa-trash"></i>Delete</a>
                                    </td>
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

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('delstatus')) {
        swal("Slider Deleted!", "Slider Deleted Successfully..!", "success")
            .then(() => {
                const newUrl = window.location.href.replace(/\?delstatus=1/g, '');
                window.history.replaceState({}, document.title, newUrl);
            });
    }

</script>