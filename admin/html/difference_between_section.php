<?php
if (!isset($_COOKIE['login'])) {
    header("location:../index.php");
    exit;
} else {
    require_once '../../root/db_connection.php';

    $query = "SELECT * FROM `differece_between_section_information`";
    $result = $db->query($query) or die('');
    $row = $result->fetch(PDO::FETCH_ASSOC);


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
                    <h4 class="card-title m-0">Change Difference Between Section</h4>
                </div>
                <div class="card-body p-5">
                    <form id="explore-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="explore_our_class" id="description" class="form-control"
                                rows="20"
                                style="width: 100%; height: 600px;"><?= $row['diff_description']; ?></textarea>
                        </div>
                        <div class="form-group">


                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="about_image">Change Image</label>
                                    <input type="file" name="about_image" class="form-control" id="about_image">
                                    <div id="about_image_error" class="text-danger"></div>

                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Change</button>
                        <button type="reset" class="btn btn-secondary btn-block">Reset Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include ('./admin_footer.php'); ?>
</div>
<script src="https://cdn.tiny.cloud/1/3jejylmkuya7n9ficis42hb9gmqut9t3d98czrp3rayj2yru/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
    });


    $('#about_image').on('change', function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $('#about_image_error').text('Only formats are allowed : ' + fileExtension.join(', '));

            $(this).val('');
        }


    });
    $('#explore-form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var description = tinymce.get('description').getContent();
        formData.set("description", description);
        $.ajax({
            url: 'difference_between_section_do.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response == 1) {
                    swal("Updated Successfully!", "Content Updated Successfully..!", "success");
                }
                if (response == 0) {
                    swal("Oops..!", "There is something wrong. Please try again later.", "error");
                }
            }
        });
    });



</script>