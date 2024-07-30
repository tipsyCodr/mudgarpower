<?php require_once ('admin_header.php'); ?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-2 m-0">
            <?php require_once ('admin_left_sidebar.php'); ?>
        </div>
        <div class="col-md-10 d-flex justify-content-center align-items-center ">
            <div class="jumbotron text-center">
                <div class="col-md-10">
                    <div class="jumbotron">
                        <h1 class="display-4">Welcome to Admin Panel</h1>
                        <p class="lead">This is the admin panel where you can manage all the content of your website.
                        </p>
                        <a href="#" class="btn btn-primary btn-lg">Start managing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <?php require_once ('admin_footer.php'); ?>
            </div>
        </div>



        ================
        add slider #

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

        ====================manage slide =========================
        <?php require_once ('admin_header.php'); ?>

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-2 m-0">
                    <?php require_once ('admin_left_sidebar.php'); ?>
                </div>
                <div class="col-md-10">
                    <div class="main-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card shadow-lg">
                                        <div class="card-header bg-dark text-white text-center">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">Manage Sliders</h4>
                                                <a href="add_slider.php" class="btn btn-primary btn-sm">Create
                                                    Slider</a>
                                            </div>
                                        </div>
                                        <div class="card-body p-5">
                                            <table id="slider_table" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
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
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                                <a href="add_slider_delete.php?id=<?php echo $row['slide_id']; ?>"
                                                                    class="btn btn-danger btn-sm">Delete</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once ('admin_footer.php'); ?>


        ====================all contact ====================

        <?php require_once ('admin_header.php'); ?>
        <?php require_once ('admin_left_sidebar.php') ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-5">
                        <div class="card shadow-lg">
                            <div class="card-header bg-dark text-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title m-0">Manage Sliders</h4>
                                    <a href="add_slider.php" class="btn btn-primary btn-sm">Create Slider</a>
                                </div>

                            </div>

                            <div class="card-body p-5">
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
            </div>

        </div>

        <?php require_once ('admin_footer.php'); ?>



        <!-- =================add certificat =============== -->


        <?php require_once ('admin_header.php'); ?>
        <?php require_once ('admin_left_sidebar.php') ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-5">
                        <div class="card shadow-lg">
                            <div class="card-header bg-dark text-white text-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title m-0">Add Certificate</h4>
                                    <a href="add_slider_manage.php" class="btn btn-primary btn-sm">Manage
                                        Certificates</a>
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
            </div>
        </div>
        <div style="position: relative; bottom: 0;">

            <?php require_once ('admin_footer.php'); ?>


            <!-- explore our classss  -->

            <?php require_once 'admin_header.php'; ?>
            <?php require_once 'admin_left_sidebar.php';
            ; ?>



            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 mt-5">
                            <div class="card shadow-lg">
                                <div class="card-header bg-dark text-white text-center">
                                    <h4 class="card-title m-0">Change Content of Explore Our Class</h4>
                                </div>
                                <div class="card-body p-5">
                                    <form id="explore-form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="explore_our_class" id="description"
                                                class="form-control" rows="20"
                                                style="width: 100%; height: 400px;"><?= $row['description']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Change The Next Class Date</label>
                                            <input type="date" name="date" class="form-control" id="date"
                                                placeholder="Date of Next Class Start"
                                                value="<?php echo $row['next_class']; ?>">
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
            </div>

            <?php require_once 'admin_footer.php'; ?>


 
            <!-- ==========diff   -->
             
require_once 'admin_header.php';
require_once 'admin_left_sidebar.php';
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="card-title m-0">Change Difference Between Section</h4>
                    </div>
                    <div class="card-body p-5">
                        <form id="explore-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="explore_our_class" id="description"
                                    class="form-control" rows="20"
                                    style="width: 100%; height: 400px;"><?= $row['diff_description']; ?></textarea>
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
    </div>
</div>

<?php require_once 'admin_footer.php'; ?>



<!-- ============ about  -->
 
require_once 'admin_header.php';

require_once 'admin_left_sidebar.php';
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="card-title m-0">Change Content of About Section</h4>
                    </div>
                    <div class="card-body p-5">
                        <form id="explore-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="explore_our_class" id="description"
                                    class="form-control" rows="20"
                                    style="width: 100%; height: 400px;"><?= $row['about_description']; ?></textarea>
                            </div>
                            <div class="form-group">


                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="about_image">Change About Image</label>
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
    </div>


</div>
<div class="container position-fixed bottom-0">
    <div class="row">
        <div class="col-md-12">
            <?php require_once 'admin_footer.php'; ?>

        </div>
    </div>
</div>