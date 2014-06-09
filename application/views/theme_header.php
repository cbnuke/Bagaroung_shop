<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bagaroung shop">
        <meta name="author" content="CBNUKE & VORD">
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/img/favicon.ico'; ?>">
        <?php echo css('bootstrap.css'); ?>
        <?php echo css('bootstrap-theme.css'); ?>
        <?php echo css('font-awesome.css'); ?>
        <style type="text/css">
            /* Sticky footer styles
-------------------------------------------------- */
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                padding-top: 50px;
                margin-bottom: 60px;
            }
            #footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                background-color: #f5f5f5;
            }


            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */
            .container .text-muted {
                margin: 20px 0;
            }

            #footer > .container {
                padding-right: 15px;
                padding-left: 15px;
            }

            code {
                font-size: 80%;
            }

            /* Custom carousel CSS */
            .carousel-control, .carousel-control:hover, .carousel-control:focus{
                color: #76492c;

            }
            .carousel-control.left {
                background: -moz-linear-gradient(left,  rgba(117,78,53,0.8) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(117,78,53,0.8)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(left,  rgba(117,78,53,0.8) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(left,  rgba(117,78,53,0.8) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(left,  rgba(117,78,53,0.8) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
                background: linear-gradient(to right,  rgba(117,78,53,0.8) 0%,rgba(255,255,255,0) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc754e35', endColorstr='#00ffffff',GradientType=1 ); /* IE6-9 */
            }
            .carousel-control.right {
                background: -moz-linear-gradient(left,  rgba(255,255,255,0) 0%, rgba(117,78,53,0.8) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(117,78,53,0.8))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(117,78,53,0.8) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(117,78,53,0.8) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(117,78,53,0.8) 100%); /* IE10+ */
                background: linear-gradient(to right,  rgba(255,255,255,0) 0%,rgba(117,78,53,0.8) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#cc754e35',GradientType=1 ); /* IE6-9 */
            }
            .carousel-inner > .item > img {
                margin: 0 auto;
            }
        </style>
        <?php echo js('jquery.js'); ?>
        <?php echo js('bootstrap.js'); ?>
        <?php echo js('jquery.ui.core.js'); ?>
        <?php echo js('jquery.ui.datepicker.js'); ?>
        <?php echo js('jquery.ui.datepicker-th.js'); ?>
        <?php echo js('jquery.ui.widget.js'); ?>
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bagaroung shop</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#promotions">Promotions</a></li>
                        <li><a href="#contactus">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><?php echo img('logo.png', array('height' => '50px')); ?></li>
                        <li><?php echo anchor('lang/set/thai', img('thailand.png', array('height' => '20px')) . 'Thai'); ?></li>
                        <li><?php echo anchor('lang/set/english', img('usa.png', array('height' => '20px')) . 'English'); ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>


        <?php
        if (isset($debug) || $alert != NULL) {
            echo '<div class="container">';
            if (isset($debug)) {
                print '<pre>';
                print_r($debug);
                print '</pre>';
            }
            if (isset($alert))
                echo $alert;
            echo '</div>';
        }
        ?>
            
