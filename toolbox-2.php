<?php
/**
* Template Name: Toolbox-2 Template
*/
?>

<div id="wrapper" class="row">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <nav>
            <h1 style="color:white">Sevinci</h1>
            <?php get_template_part('templates/toolbox','filters'); ?>
        </nav>
        <br>
        <ul class="sidebar-nav">
            <li><a href="#">Get Started</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Credits</a></li>
            <li><a href="#">Languages</a></li>
        </ul>
        <br>
        <nav id="social-nav">
            <a href="#"><i class="fa fa-facebook"></i></a>
            &nbsp;
            <a href="#"><i class="fa fa-youtube"></i></a>
            &nbsp;
            <a href="#"><i class="fa fa-twitter"></i></a>
        </nav>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="glyphicon glyphicon-align-justify"></i> Menu</a>
                    <br>
                    <br>
                    <?php get_template_part('templates/toolbox','tools'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div><!-- /#wrapper -->
