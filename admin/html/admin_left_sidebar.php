<?php
if (!isset($_COOKIE['login'])) {
    header("location:../index.php");
    die();
}

?>
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5" id="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Slider Content
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="add_slider.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span
                                    class="hide-menu"> Add Slider</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_slider_manage.php" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu">Manage Sliders</span></a>
                        </li>



                    </ul>
                </li>

                <!-- contact record  -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Contact Information
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="all_contact_records.php" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu">Contact Records</span></a>
                        </li>




                    </ul>
                </li>
                <!-- end contact record  -->
                <!-- Certificate  -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Certificates &
                            Photos
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="add_certificates.php" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu">Add Certificates or
                                    Photos</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="manage_certifcate.php" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu"> Manage Certificates &
                                    Photos</span></a>
                        </li>




                    </ul>
                </li>
                <!-- certificate -->
                <!-- explore class content  -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Explore Our Class
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="explore_our_class.php" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu">Change Explore Class
                                    Content</span></a>
                        </li>




                    </ul>
                </li>
                <!-- explore class content  -->
                <!-- about content   -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">About Contents
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="change_about_content.php" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu">Change About Contents
                                    Content</span></a>
                        </li>




                    </ul>
                </li>
                <!-- about content   -->

                <!-- diff between  -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Difference Between
                            Content
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="difference_between_section" class="sidebar-link"><i
                                    class="mdi mdi-email-outline"></i><span class="hide-menu">Change
                                    Content</span></a>
                        </li>




                    </ul>
                </li>
                <!-- diff between  -->

                <li class="sidebar-item">
                    <a href="../log-out.php" class="sidebar-link"><i class="mdi mdi-logout-outline"></i><span
                            class="hide-menu"><i class="mdi mdi-logout-variant"></i> Logout Content</span></a>

                </li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->