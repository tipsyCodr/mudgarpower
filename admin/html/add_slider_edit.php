<?php
require_once ('../../root/db_connection.php');

$id = $_REQUEST['id'];

$query = "SELECT * FROM `slide_information` WHERE `slide_id` = '$id'";

$result = $db->query($query) or die('');

$row = $result->fetch(PDO::FETCH_ASSOC);
// print_r($row);

?>

<?php require_once ('admin_header.php'); ?>
<?php require_once ('admin_left_sidebar.php') ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
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
                                    placeholder="Enter slider title" value="<?= $row['slide_title']; ?>">
                                <div class="invalid-feedback" id="title_error"></div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="subtitle" class="form-label">Slider Subtitle</label>
                                <input type="text" class="form-control" name="subtitle" id="subtitle"
                                    placeholder="Enter slider subtitle" value="<?= $row['slide_subtitle']; ?>">
                                <div class="invalid-feedback" id="subtitle_error"></div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="image" class="form-label">Slider Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <div class="invalid-feedback" id="image_error"></div>
                                <input type="hidden" name="old_file" value="<?= $row['slide_image']; ?>">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="position: relative; bottom: 0;">

    <?php require_once ('admin_footer.php'); ?>
    <script>
        $("#add_slider_form").submit(function (e) {
            e.preventDefault();

            $(this).find("input,select,textarea").not("[type=submit]").not("[type=file]").each(function () {
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

            if ($(".is-invalid").length == 0) {
                $.ajax({
                    url: 'add_slider_edit_do.php?update_id=<?php echo $id; ?>',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == 1) {

                            swal("Slider Updated!", "Slider Updated Successfully..!", "success");
                            window.location.replace('add_slider_manage.php');
                        } if (data == 2) {
                            swal("Oops..!", "There is something wrong Plese Try After some time ", "error");
                            window.location.replace('add_slider_manage.php');

                        }

                    },
                    error: function (data) {
                        swal("Oops..!", "There is something wrong ", "error");
                    }
                });
            }
        });
    </script>
</div>