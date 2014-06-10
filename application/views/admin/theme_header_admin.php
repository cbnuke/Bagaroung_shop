<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bag Aroung Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="VoRD">
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/favicon.ico'; ?>">
        <?php echo css('bootstrap.css'); ?>
        <?php echo css('font-awesome.css'); ?>

        <!-- SB Admin CSS - Include with every page -->        
        <?php echo css('sb-admin.css'); ?>

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href=""><?php echo img('logo.png', array('height' => '30px')); ?>&nbsp;Bag Aroung Shop Admin</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right visible-md visible-lg">                     
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> User Login <i class="fa fa-caret-down"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href=""><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>

                <!-- /.navbar-top-links -->
                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu">                        
                            <li>
                                <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                            </li>
                            <!-- Product menu -->
                            <li>
                                <a href="#"><i class="fa fa-file-o fa-fw"></i>&nbsp;Products<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= anchor('Products/add', '<i class="fa fa-plus-circle fa-fw"></i>&nbsp;เพิ่มสินค้า'); ?>                                        
                                    </li>
                                    <li>
                                        <?= anchor('Products', '<i class="fa fa-list fa-fm "></i>&nbsp;รายการสินค้า'); ?>                                       
                                    </li>
                                    <!-- Product type -->
                                    <li>
                                        <a href="#">&nbsp;Product Types <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <?= anchor('ProductTypes/add', '<i class="fa fa-plus-circle fa-fw"></i>&nbsp;เพิ่มประเภทสินค้า') ?> 
                                            </li>
                                            <li>
                                                <?= anchor('ProductTypes', '<i class="fa fa-list fa-fm "></i>&nbsp;รายการประเภทสินค้า') ?>                                               
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                            </li>                         


                            <!-- Promotions -->
                            <li>
                                <a href="#"><i class="fa fa-bullhorn fa-fw"></i>&nbsp;Promotions<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= anchor('Promotions/add', '<i class="fa fa-plus-circle fa-fw"></i>&nbsp;สร้างโปรโมชั่น') ?>                                       
                                    </li>                                   
                                    <li>
                                        <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i>&nbsp;โปรโมชั่นปัจจุบัน</a>
                                    </li>
                                    <li>
                                        <?= anchor('Promotions', '<i class="fa fa-list fa-fm "></i>&nbsp;รายการโปรโมชั่นทั้งหมด') ?>   
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-trash-o fa-fw"></i>&nbsp;โปรโมชั่นหมดอายุ</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Slides -->
                            <li>
                                <?= anchor('slides', '<i class="fa fa-play fa-fw"></i>&nbsp;Slides') ?>
<!--                                <a href="slides"><i class="fa fa-play fa-fw"></i>&nbsp;Slides</a>                             -->
                            </li>                           
                            <!-- User -->
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>&nbsp;Users<span class="fa arrow"></a>    
                                <ul class="nav nav-second-level">
                                    <li>
                                        <?= anchor('Users/add', '<i class="fa fa-plus-circle fa-fw"></i>&nbsp;เพิ่มผู้ใช้งาน'); ?>                                        
                                    </li>
                                    <li>
                                        <?= anchor('Users', '<i class="fa fa-users fa-fm "></i>&nbsp;ผู้ใช้ทั้งหมด'); ?>                                        
                                    </li>                                    
                                </ul>
                            </li>
                            <!--Logout-->
                            <li class="visible-xs visible-sm">  
                                <?= anchor('', '<i class="fa fa-sign-out fa-fw"></i>&nbsp;ออกจากระบบ'); ?>                             
                            </li>
                        </ul>

                        <!-- /#side-menu -->
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div  id="page-wrapper">

                <?php
                if (isset($debug)) {
                    print '<pre>';
                    print_r($debug);
                    print '</pre>';
                }
                ?>
                <?php if (isset($alert)) echo $alert; ?>
