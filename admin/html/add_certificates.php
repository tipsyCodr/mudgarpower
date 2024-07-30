<?php
if (!$_COOKIE['login']) {
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

        <div class="col-md-12 ">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title m-0">Add Certificate</h4>
                        <a href="manage_certifcate.php" class="btn btn-primary btn-sm">Manage Certificates</a>
                    </div>

                </div>
                <div class="card-body p-5">
                    <form id="add_slider_form" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="image" class="form-label">Slider Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                            <button type="reset" class="btn btn-secondary btn-block">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include ('./admin_footer.php'); ?>
</div>
<script>

    $("#add_slider_form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'add_certificates_do.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == '1') {

                    swal("Certificate Inserted.!", "Certificated inserted Successfully..!", "success");
                    $("#add_slider_form").trigger("reset");
                }



            },
            error: function (data) {
                swal("Oops..!", "There is something wrong ", "error");
            }
        });
    });
</script>
</div>