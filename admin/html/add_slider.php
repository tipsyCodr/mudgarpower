<?php
if (!$_COOKIE['login']) {
    header("location:../index.php");
}
?>

<?php include ('./admin_header.php'); ?>

<!-- Main Wrapper -->
<div id="main-wrapper">
    <!-- Sidebar -->
    <?php include ('./admin_left_sidebar.php'); ?>

    <!-- Page Content -->
    <div class="page-wrapper">

        <div class="col-md-8 offset-md-2 mt-5">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title m-0">Add Slider</h4>
                        <a href="add_slider_manage.php" class="btn btn-primary btn-sm">Manage Sliders</a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <form id="add_slider_form" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="title" class="form-label">Slider Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Enter slider title">
                            <div class="invalid-feedback" id="title_error"></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="subtitle" class="form-label">Slider Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle"
                                placeholder="Enter slider subtitle">
                            <div class="invalid-feedback" id="subtitle_error"></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="image" class="form-label">Slider Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <div class="invalid-feedback" id="image_error"></div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">Add Slider</button>
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

        $(this).find("input,select,textarea").not("[type=submit]").each(function () {
            if ($(this).val() == '') {
                $(this).addClass("is-invalid");
                $(this).next(".invalid-feedback").html($(this).attr("placeholder") + " is required");
            } else {
                $(this).removeClass("is-invalid");
                $(this).next(".invalid-feedback").html("");
            }
        });

        $(this).find("input,select,textarea").not("[type=submit]").focus(function () {
            $(this).removeClass("is-invalid");
            $(this).next(".invalid-feedback").html("");
        }).on("shown.bs.popover", function () {
            $(this).removeClass("is-invalid");
            $(this).next(".invalid-feedback").html("");
        });
        var image_extension = $("#image").val().substr($("#image").val().lastIndexOf(".")).toLowerCase();
        if (image_extension != '.jpg' && image_extension != '.jpeg' && image_extension != '.png' && image_extension != '.gif') {
            $("#image").addClass("is-invalid");
            $("#image_error").html("Invalid file type. Only images are allowed");
        } else {
            $("#image").removeClass("is-invalid");
            $("#image_error").html("");
        }

        if ($(".is-invalid").length == 0) {
            $.ajax({
                url: 'add_slider_do.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    swal("Slider Created!", "Slider Created Successfully..!", "success");

                    $("#add_slider_form").trigger("reset");

                },
                error: function (data) {
                    swal("Oops..!", "There is something wrong ", "error");
                }
            });
        }
    });