<?php
/**
 * Created by PhpStorm.
 * User: KVUSH-NBOOK
 * Date: 05.09.2017
 * Time: 14:29
 */
?>

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <ul class="nav navbar-nav navbar-right">
                <li style="padding: 0 20px;">
                    <a href="logout.php">Выход</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Главное меню</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/admin/all"><i class="fa fa-link"></i> <span>Все сообщения</span></a></li>
                <li><a href="/admin/hide"><i class="fa fa-link"></i> <span>Выключенные сообщения</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Что то еще</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">опция 1</a></li>
                        <li><a href="#">опция 2</a></li>
                    </ul>
                </li>
                <li><a href="/" target="_blank"><i class="fa fa-link"></i> <span>Перейти на сайт</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php
            switch ($_GET['page']) {
                case "all":
                    include ('admin-all-msg.php');
                    break;
                case "hide":
                    include ('admin-hide-msg.php');
                    break;
                default:
                    include ('admin-all-msg.php');
                    break;
            }
        ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
