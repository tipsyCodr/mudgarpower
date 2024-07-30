<?php
if (!isset($_COOKIE['login'])) {
    header("location:../index.php");
    exit;
} else {
    require_once '../../root/db_connection.php';

    $query = "SELECT * FROM `explore_our_class`";
    $result = $db->query($query) or die('');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    // print_r($row);


}
?>

<?php include ('./admin_header.php'); ?>

<!-- Main Wrapper -->
<div id="main-wrapper">
    <!-- Sidebar -->
    <?php include ('./admin_left_sidebar.php'); ?>

    <!-- Page Content -->
    <div class="page-wrapper">

        <div class="col-md-12 d-flex justify-content-center align-items-center ">
            <div class="col-md-12 ">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="card-title m-0">Change Content of Explore Our Class</h4>
                    </div>
                    <div class="card-body p-5">
                        <form id="explore-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="explore_our_class" id="description"
                                    class="form-control" rows="40"
                                    style="width: 100%; height: 600px;"><?= $row['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Change The Next Class Date</label>
                                <input type="date" name="date" class="form-control" id="date"
                                    placeholder="Date of Next Class Start" value="<?php echo $row['next_class']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Class
                                Content</button>
                            <button type="reset" class="btn btn-secondary btn-block">Reset Form</button>
                        </form>
                    </div>
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

    $('#explore-form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var date = $('#date').val();
        var description = tinymce.get('description').getContent();
        formData.set('date', date);
        formData.set('description', description);



        $.ajax({
            url: 'explore_our_class_do.php',
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