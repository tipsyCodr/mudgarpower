<?php
if(!isset($_COOKIE['login'])){
    header("location:../index.php");
    die();
}

?>

<footer class="footer text-center">
    @ All Rights Reserved & Designed by
    <a href="https://pathideamultiskill.com/"><img src="./uploads/logo/logo.png" alt="Path Idea Multiskill" class="img-fluid" width="100"></a>.
</footer>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="../assets/libs/flot/excanvas.js"></script>
<script src="../assets/libs/flot/jquery.flot.js"></script>
<script src="../assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../assets/libs/flot/jquery.flot.time.js"></script>
<script src="../assets/libs/flot/jquery.flot.stack.js"></script>
<script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../dist/js/pages/chart/chart-page-init.js"></script>
<script src="./sweetalert.js"></script>
<script src="./tinymce/tinymce.min.js"></script>
<script>
    $(document).ready(function(){
        $("#toggle-button").on('click',function(){
            $("#left-sidebar").slideToggle();
        })
    })
</script>

</body>

</html>