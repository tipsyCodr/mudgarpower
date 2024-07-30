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
                        <h4 class="card-title m-0">Manage Certificates</h4>
                        <a href="add_certificates.php" class="btn btn-primary btn-sm">Add Certificates or Pictures</a>
                    </div>
                </div>
                <div class="card-body p-5 table-responsive">
                    <table id="slider_table" class="table table-striped table-bordered text-center" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Image</th>
                                <th>Options</th>

                            </tr>
                        </thead>
                        <!-- <tbody>
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
                                        </a><br />
                                        <a href="add_slider_delete.php?id=<?php echo $row['slide_id']; ?>"
                                            class="btn btn-danger btn-sm mt-1 "> <i class="fas fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody> -->
                        <?php
                        $directory = "../../images/certificates";
                        $images = glob($directory . "/*.jpg");

                        foreach ($images as $key => $value) {
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><i><img src="<?= $value ?>" alt="#" style="width:200px" /></i><br>
                                    <button type="button" class="btn btn-sm btn-secondary view-photo-btn"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        data-img-src="<?= $value ?>">View Photo</button>
                                </td>
                                <!-- Modal to view photo -->
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Image View</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="modalImage" src="" alt="#" style="width:100%" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <td>


                                    <a href="certificate_delete_do.php?picname=<?= $value; ?>"
                                        class="btn btn-danger btn-sm mt-5 "> <i class="fas fa-trash"></i>Delete</a>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
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
        swal("Image Deleted!", "Image Deleted Successfully..!", "success")
            .then(() => {
                const newUrl = window.location.href.replace(/\?delstatus=1/g, '');
                window.history.replaceState({}, document.title, newUrl);
            });
    }


    $(document).ready(function () {
        $('.view-photo-btn').on('click', function () {
            var imgSrc = $(this).data('img-src');
            $('#modalImage').attr('src', imgSrc);
        });
    });

</script>