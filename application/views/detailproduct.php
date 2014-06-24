<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="row hidden-sm hidden-xs">                
                <div class="col-md-12">
                    <div class="row">
                        <h3><?= lang('recommend') ?></h3>
                        <div class="col-md-12">
                            <?php
                            foreach ($recommend as $row) {
                                echo '<a href="' . $row['id'] . '" class="thumbnail">';
                                echo '<img src="' . img_url() . $row['img_front'] . '" alt="..." >';
                                echo '<div class="caption">';
                                echo '<h4>' . unserialize($row['product_name'])[$language] . '</h4>';
                                echo '<p>' . lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht') . '</p>';
                                echo '</div>';
                                echo '</a>';
                            }
                            ?>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
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
                </div>
                <div class="col-md-6">
                    <h3 class="text-center"><strong><?= lang('product_price') ?></strong>  <?= number_format($detail['product_price'], 2) ?> <?= lang('baht') ?></h3>
                    <p class="text-center"><a href="#howto" class="btn btn-primary" ><?= lang('how_to_order') ?></a></p>
                    <dl>
                        <dt><?= lang('detail_product') ?></dt>
                        <dd><?= unserialize($detail['detail'])[$language] ?></dd>
                        <dt><?= lang('product_size') ?></dt>
                        <dd><?= lang('product_weight') ?> : <?= $detail['weight'] ?> <?= lang('kg') ?></dd>
                        <dd><?= lang('product_width') ?> : <?= $detail['width'] ?> <?= lang('cm') ?></dd>
                        <dd><?= lang('product_high') ?> : <?= $detail['hight'] ?> <?= lang('cm') ?></dd>
                        <dd><?= lang('product_top_width') ?> : <?= $detail['top_width'] ?> <?= lang('cm') ?></dd>
                        <dd><?= lang('product_base_width') ?> : <?= $detail['base_width'] ?> <?= lang('cm') ?></dd>
                    </dl>
                </div>                
            </div>
            <div class="row" style="margin-top: 20px;">
                <?php
                foreach ($img as $row) {
                    echo '<div class="col-md-6"><div class="thumbnail"><img src="' . img_url() . $row['img_full'] . '" alt="..." ></div></div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row " id="howto">
        <div class="col-sm-12 col-xs-12" style="height: 300px; background-color: #999;"><h3><?= lang('how_to_order') ?></h3></div>
    </div>
</div>