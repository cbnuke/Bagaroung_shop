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
        <?php echo css('customize-page.css'); ?>        
        <?php echo js('jquery.js'); ?>
        <?php echo js('bootstrap.js'); ?>
        <?php echo js('jquery.elevateZoom.js'); ?>
    </head>
    <body>
        <?php echo js('customize-js.js'); ?>
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
                    <a class="navbar-brand" href="#"><?php echo img('logo.png', array('height' => '44px', 'class' => 'visible-xs', 'style' => 'float: left;margin-top:-15px;')); ?> Bagaroung</a>
                </div>
                <div class="navbar-collapse collapse">
                    <?php
                    if (!strpos(uri_string(), 'home')) {
                        ?>
                        <ul id="top-menu" class="nav navbar-nav">
                            <li><a href="<?= base_url('home') ?>"><?= lang('menu_home') ?></a></li>
                            <li><a href="<?= base_url('home/#des_promotions') ?>"><?= lang('menu_promotions') ?></a></li>
                            <li><a href="<?= base_url('home/#des_products') ?>"><?= lang('menu_products') ?></a></li>                        
                            <li><a href="<?= base_url('home/#des_contactus') ?>"><?= lang('menu_contactus') ?></a></li>
                        </ul>
                        <?php
                    } else {
                        ?>
                        <ul id="top-menu" class="nav navbar-nav">
                            <li class="active"><a href="#" id="home"><?= lang('menu_home') ?></a></li>
                            <li><a href="#des_promotions" id="promotions"><?= lang('menu_promotions') ?></a></li>
                            <li><a href="#des_products" id="products"><?= lang('menu_products') ?></a></li>                        
                            <li><a href="#des_contactus" id="contactus"><?= lang('menu_contactus') ?></a></li>
                        </ul>
                    <?php } ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs"><?php echo img('logo.png', array('height' => '50px')); ?></li>
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
            
