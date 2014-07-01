<!-- start top_bg -->

<div class="top_bg">
    <div class="container">
        <div class="main_top">
            <h2 class="style"><?= lang('head_products') ?></h2>
        </div>
    </div>
</div>

<!-- start main -->
<div class="main_bg">
    <div class="container">
        <div class="row">

            <!-- start right_sidebar -->
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                <div class="row">                
                    <div class="col-md-12">
                        <div class="row">
                            <h4 class="style"><?= lang('recommend') ?></h4>
                            <div class="col-md-12">

                                <div class="row placeholders">
                                    <?php
                                    foreach ($recommend as $row) {
                                        ?>     
                                        <div class="placeholder thumbnail">
                                            <a href="<?php echo base_url('detailproduct/id/' . $row['id']); ?>">  
                                                <img title="<?= lang('detail_product'); ?>" src="<?= img_url() . $row['img_front'] ?>"
                                                     onmouseover="this.src = '<?= img_url() . $row['img_back'] ?>'" 
                                                     onmouseout="this.src = '<?= img_url() . $row['img_front'] ?>'" 
                                                     width="100%" alt="..."/>
                                            </a>
                                            <h4>
                                                <?= unserialize($row['product_name'])[$language]; ?>
                                            </h4>
                                            <?php
                                            $is_expire = FALSE;
                                            foreach ($all_promotion as $pro) {
                                                if ($pro['id'] == $row['promotion_id']) {
                                                    $is_expire = TRUE;
                                                }
                                            }
                                            if ($is_expire == FALSE) {
                                                echo '<span class="text-muted">' . lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht') . '</span>';
                                            } else {
                                                echo '<span class="text-muted"><del><small>' . lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht') . '</small></del></span> ';
                                                echo '<br>';
                                                echo '<span class="text-danger">' . lang('product_price') . ' ' . number_format($row['promotion_price'], 2) . ' ' . lang('baht') . '</span>';
                                            }
                                            ?> 
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right_sidebar --> 

            <!-- start content -->

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 co" style="padding-top: 25px;padding-left: 10px;padding-right: 10px">

                <div class="row">
                    <div class="col-md-6 col-md-offset-3 hidden-lg hidden-md">
                        <h3><?= unserialize($detail['product_name'])[$language] ?></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row col-md-12 col-sm-12 col-xs-12 thumbnail center-block">
                            <img id="img_01" src="<?= img_url() . $detail['img_front'] ?>" data-zoom-image="<?= img_url() . $detail['img_front'] ?>"/> 
                        </div>
                        <div class="row" id="gallery_01">
                            <div class="col-md-3 col-xs-3">
                                <a href="#" data-image="<?= img_url() . $detail['img_front'] ?>" data-zoom-image="<?= img_url() . $detail['img_front'] ?>"> 
                                    <img id="img_01" src="<?= img_url() . $detail['img_front'] ?>" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <a href="#" data-image="<?= img_url() . $detail['img_back'] ?>" data-zoom-image="<?= img_url() . $detail['img_back'] ?>"> 
                                    <img id="img_01" src="<?= img_url() . $detail['img_back'] ?>" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <a href="#" data-image="<?= img_url() . $detail['img_right'] ?>" data-zoom-image="<?= img_url() . $detail['img_right'] ?>"> 
                                    <img id="img_01" src="<?= img_url() . $detail['img_right'] ?>" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <a href="#" data-image="<?= img_url() . $detail['img_left'] ?>" data-zoom-image="<?= img_url() . $detail['img_left'] ?>"> 
                                    <img id="img_01" src="<?= img_url() . $detail['img_left'] ?>" class="img-responsive"/>
                                </a>
                            </div>
                        </div> 
                        <div class="row" style="padding-top: 10px">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="fb-like" 
                                     data-href="<?= current_url(); ?>"
                                     data-layout="standard" 
                                     data-action="like" 
                                     data-show-faces="true" 
                                     data-share="true">
                                </div>
                            </div>
                        </div>

                        <script>
                            //initiate the plugin and pass the id of the div containing gallery images 
                            $("#img_01").elevateZoom({
                                constrainType: "height",
                                constrainSize: 274,
                                zoomType: "lens",
                                lensShape: 'round',
                                containLensZoom: true,
                                gallery: 'gallery_01',
                                galleryActiveClass: "active",
                                loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
                            ////pass the images to Fancybox 

                        </script>
                        <!--test-->

                        <!--end test-->
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="desc1">
                                <div class="hidden-sm hidden-xs">
                                    <h3><?= unserialize($detail['product_name'])[$language] ?></h3>
                                </div>
                                <div class="desc1">  
                                    <h3 class="text-center">
                                        <?php
                                        if ($promotion == NULL) {
                                            echo '<strong>' . lang('product_price') . '</strong>' . '&nbsp;&nbsp;';
                                            echo '<span>' . number_format($detail['product_price'], 2) . '</span>' . '&nbsp;&nbsp;';
                                            echo lang('baht');
                                        } else {
                                            echo '<div class="row">';
                                            echo '<strong>' . lang('product_price') . '</strong>' . '&nbsp;&nbsp;';
                                            echo '<span  style="text-decoration:line-through;" >' . number_format($detail['product_price'], 2) . '</span>' . '&nbsp;&nbsp;';
                                            echo lang('baht');
                                            echo '</div>';

                                            echo '<div class="row">'; //                                           
                                            echo '<span  class="text-danger"  >' . number_format($promotion['promotion_price'], 2) . '</span>' . '&nbsp;&nbsp;';
                                            echo '</div>';
                                        }
                                        ?>   
                                    </h3>                                    
                                </div>
                            </div>
                            <div class="clear"></div>                            
                        </div>

                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="top_main"> 
                                    <div class="fb-send" style="vertical-align: middle;"
                                         data-href="https://www.facebook.com/BagAround/message" 
                                         data-colorscheme="light">
                                    </div>
                                    <!--"<? current_url(); ?>"-->
                                    <a href="#howto"><?= lang('how_to_order') ?></a>
                                </div>
                            </div>
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                        </div> 

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4>
                                    <dt><?= lang('product_size') ?></dt>
                                </h4>
                                <h4 class="style center-block">
                                    <dl class="dl-horizontal">
                                        <dt><?= lang('product_width') ?></dt>
                                        <dd><?= $detail['width'] ?> <?= lang('cm') ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= lang('product_high') ?></dt>
                                        <dd><?= $detail['hight'] ?> <?= lang('cm') ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= lang('product_weight') ?> </dt>
                                        <dd><?= $detail['weight'] ?> <?= lang('kg') ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= lang('product_top_width') ?> </dt>
                                        <dd><?= $detail['top_width'] ?> <?= lang('cm') ?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><?= lang('product_base_width') ?></dt>
                                        <dd><?= $detail['base_width'] ?> <?= lang('cm') ?></dd>
                                    </dl>
                                </h4>
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="media">
                            <h4 class="media-heading">
                                <dt><?= lang('detail_product') ?></dt>
                            </h4>
                            <div class="media-body">
                                <blockquote>
                                    <p><?= unserialize($detail['detail'])[$language] ?></p> 
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <?php
                        foreach ($img as $row) {
                            echo '<div class="col-md-6"><img src="' . img_url() . $row['img_full'] . '" class="img-responsive" width="100%" alt="..." ></div>';
                        }
                        ?>
                    </div>
                </div>

            </div>           

            <!--end content--> 

        </div>
    </div>
</div>
<!--end main-->

<div id="howto"  >
    <div class="top_bg">
        <div class="container">
            <div class="main_top">
                <h2 class="style" ><?= lang('how_to_order') ?></h2>
            </div>
        </div>
    </div>
    <div class="main_bg">
        <div class="container">
            <div class="main">
                <div class="row" >
                    <div class="placeholders center-block">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




