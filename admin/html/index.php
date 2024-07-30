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
    </div>

    <!-- Footer -->
    <?php include ('./admin_footer.php'); ?>
</div>