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
        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="VoRD">
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/favicon.ico'; ?>">
        <base href="<?php echo base_url(); ?>">
        <?php echo css('bootstrap.css'); ?>
        <?php echo css('font-awesome.css'); ?>
        <!-- Generic page styles -->
        <!--<? css('style.css') ?>-->
        <!-- blueimp Gallery styles -->
        <?= css('blueimp-gallery.min.css') ?>
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <?= css('jquery.fileupload.css') ?>
        <?= css('jquery.fileupload-ui.css') ?>

        <!-- SB Admin CSS - Include with every page -->        
        <?php echo css('sb-admin.css'); ?>
        <?php echo css('bootstrap-datetimepicker.css'); ?>
        <?php echo css('colorbox.css'); ?>


        <!-- Core Scripts - Include with every page -->
        <?= js('jquery.js'); ?>
        <?= js('bootstrap.js'); ?>
        <?= js('jquery.colorbox.js'); ?>
        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <?= js('fileupload/vendor/jquery.ui.widget.js') ?>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <?= js('fileupload/tmpl.min.js') ?>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <?= js('fileupload/load-image.min.js') ?>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <?= js('fileupload/canvas-to-blob.min.js') ?>
        <!-- blueimp Gallery script -->
        <?= js('fileupload/jquery.blueimp-gallery.min.js') ?>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <?= js('fileupload/jquery.iframe-transport.js') ?>
        <!-- The basic File Upload plugin -->
        <?= js('fileupload/jquery.fileupload.js') ?>
        <!-- The File Upload processing plugin -->
        <?= js('fileupload/jquery.fileupload-process.js') ?>
        <!-- The File Upload image preview & resize plugin -->
        <?= js('fileupload/jquery.fileupload-image.js') ?>
        <!-- The File Upload validation plugin -->
        <?= js('fileupload/jquery.fileupload-validate.js') ?>
        <!-- The File Upload user interface plugin -->
        <?= js('fileupload/jquery.fileupload-ui.js') ?>
        <!-- The main application script -->
        <?= js('fileupload/main.js') ?>
        <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
        <!--[if (gte IE 8)&(lt IE 10)]>
        <?= js('fileupload/jquery.xdr-transport.js') ?>
        <![endif]-->

        <style>
            th{
                text-align: center;
                vertical-align: middle ! important;
            }
            td{
                vertical-align: middle ! important;
            }
            .td-text-center{
                text-align: center;
            }

        </style>

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

                    <a class="navbar-brand" href=""><?php echo img('logo.png', array('height' => '30px')); ?>&nbsp;Bag Around Shop Admin</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right visible-md visible-lg">                     
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <?php
                        $f_name = $this->session->userdata('firstname');
                        $f_last = $this->session->userdata('lastname');
                        ?>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">                            
                            <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp; <?= $f_name . '  ' . $f_last ?> &nbsp;&nbsp;<i class="fa fa-caret-down"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <?= anchor('administrator/logout', '<i class="fa fa-sign-out fa-fw"></i>&nbsp;ออกจากระบบ'); ?> 
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
                                        <?= anchor('Promotions/', '<i class="fa fa-list fa-fm "></i>&nbsp;รายการโปรโมชั่นทั้งหมด') ?>   
                                    </li>

                                </ul>
                            </li>
                            <!-- Slides -->
                            <li>
                                <?= anchor('Slides', '<i class="fa fa-play fa-fw"></i>&nbsp;Slides') ?>
                            </li>
                            <!-- Gallery -->
                            <li>
                                <?= anchor('Gallery', '<i class="fa fa-photo fa-fw"></i>&nbsp;Gallery') ?>
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
