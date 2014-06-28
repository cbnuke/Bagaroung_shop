<!-- start top_bg -->

<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h2 class="style"><?= lang('head_products') ?></h2>
        </div>
    </div>
</div>

<!-- start main -->
<div class="main_bg" id="des_products">
    <div class="wrap">
        <div class="row">
            <!-- start right_sidebar -->
            <div class="col-md-2">
                <div class="row hidden-sm hidden-xs">                
                    <div class="col-md-12">
                        <div class="row">
                            <h3><?= lang('recommend') ?></h3>
                            <div class="col-md-12">
                                <?php
                                foreach ($recommend as $row) {
                                    ?>     
                                    <div class="media">
                                        <a class="pull-left thumbnail" href="<?php echo base_url('detailproduct/id/' . $row['id']); ?>">                                        
                                            <!--<img class="media-object" src="<?= img_url() . $row['img_front'] ?>" width="90px" alt="...">-->
                                            <img title="<?= lang('detail_product'); ?>" src="<?= img_url() . $row['img_front'] ?>"
                                                 onmouseover="this.src = '<?= img_url() . $row['img_back'] ?>'" 
                                                 onmouseout="this.src = '<?= img_url() . $row['img_front'] ?>'" 
                                                 width="90px" alt="..."/>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
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
                                                echo lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht');
                                            } else {
                                                echo '<span><del><small>' . lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht') . '</small></del></span> ';
                                                echo '<span class="text-danger">' . lang('product_price') . ' ' . number_format($row['promotion_price'], 2) . ' ' . lang('baht') . '</span>';
                                            }
                                            ?>                                        
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right_sidebar --> 
            <!-- start content -->         
            <div class="col-md-10" style="padding-top: 25px;padding-left: 10px;padding-right: 10px">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

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
                                <h3><?= unserialize($detail['product_name'])[$language] ?></h3>
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
                            <div class="top_main">                                
                                <a href="#howto"><?= lang('how_to_order') ?></a>
                                <div class="clear"></div>
                            </div>
                        </div>                    

                        <div class="row">
                            <div class="media">
                                <h4 class="media-heading">
                                    <dt><?= lang('product_size') ?></dt>
                                </h4>
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="style">
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
                                            </h4>      
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="style">                                            
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
                        </div>

                        <div class="row">
                            <div class="media">
                                <h4 class="media-heading">
                                    <dt><?= lang('detail_product') ?></dt>
                                </h4>
                                <div class="media-body">
                                    <blockquote>
                                        <?= unserialize($detail['detail'])[$language] ?> 
                                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>-->
                                    </blockquote>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row row_content text-center" >
                            <div class="col-md-6 col-md-offset-3">
                                <!--                                <div class="fb-like" 
                                                                     data-href="<? current_url(); ?>" 
                                                                     data-layout="standard" data-action="like" data-show-faces="false" data-share="true">                                         
                                                                </div>-->
                            </div>                            
                        </div>

                    </div>                
                </div>
                <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                    <?php
                    foreach ($img as $row) {
                        echo '<div class="col-md-6"><img src="' . img_url() . $row['img_full'] . '" class="img-responsive" alt="..." ></div>';
                    }
                    ?>
                </div>
            </div>           

        </div>

    </div>

</div>
<div id="howto" >
    <div class="top_bg">
        <div class="wrap">
            <div class="main_top">
                <h2 class="style"><?= lang('how_to_order') ?></h2>
            </div>
        </div>
    </div>
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="row" style="height: 300px;">
                    <h2 class="style"><?= lang('how_to_order'); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>




