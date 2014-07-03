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
        <div class="row main">

            <!-- start right_sidebar -->
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                <div class="row">                
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <h4 class="style"><?= lang('recommend') ?></h4>
                            <div class="col-md-12">

                                <div class="row placeholders">
                                    <?php
                                    foreach ($recommend as $row) {
                                        ?>     
                                        <div class="placeholder thumbnail">
                                            <a href="<?php echo base_url('DetailProduct/id/' . $row['id']); ?>">  
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

            <div id="content" class="col-lg-10 col-md-10" style="padding-top: 25px;padding-left: 10px;padding-right: 10px">
                <div class="col-sm-12 col-xs-12" > 

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 hidden-lg hidden-md">
                            <h3><?= unserialize($detail['product_name'])[$language] ?></h3>
                        </div>
                    </div>
                    <div class="row">                 
                         <!--problem in   moble respontive--> 
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

                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="hidden-sm hidden-xs">
                                        <h3><?= unserialize($detail['product_name'])[$language] ?></h3>
                                    </div>
                                    <div class="text-center">  
                                        <h4>
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
                                        </h4>                                    
                                    </div>      
                                </div>

                                <div class="row">
                                    <div class="col-sm-12"> 
                                        <div class="top_main"> 
                                            <div class="fb-send" style="vertical-align: middle;"
                                                 data-href="<? current_url(); ?>" 
                                                 data-colorscheme="light">
                                            </div>
                                            <!--"<? current_url(); ?>"-->                                    
                                            <button title="<?= lang('how_to_order') ?>" id='link_howto'><?= lang('how_to_order') ?></button>
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
                                    <div class="col-md-12 col-sm-12 ">
                                        <dt><?= lang('product_size') ?></dt>
                                        <dl class="dl-horizontal">
                                            <dt><?= lang('product_width') ?></dt>
                                            <dd><?= $detail['width'] ?> <?= lang('cm') ?></dd>

                                            <dt><?= lang('product_high') ?></dt>
                                            <dd><?= $detail['hight'] ?> <?= lang('cm') ?></dd>

                                            <dt><?= lang('product_weight') ?> </dt>
                                            <dd><?= $detail['weight'] ?> <?= lang('kg') ?></dd>

                                            <dt><?= lang('product_top_width') ?> </dt>
                                            <dd><?= $detail['top_width'] ?> <?= lang('cm') ?></dd>

                                            <dt><?= lang('product_base_width') ?></dt>
                                            <dd><?= $detail['base_width'] ?> <?= lang('cm') ?></dd>
                                        </dl>
                                        <div class="product-description">
                                            <p><?= unserialize($detail['detail'])[$language] ?></p> 
                                            <p>Using beautiful thick and tactile leather, the Tessie Small Satchel has a refined yet retro elegance. Its shape is inspired by vintage satchels from the Mulberry archives and it has an adjustable leather shoulder strap that can be worn on the shoulder or as a hands-free messenger bag.</p>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>                         
                    </div>


                    <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <?php
                            foreach ($img as $row) {
                                echo '<div class="col-md-6"><a class="fancybox" rel="gallery1" href="' . img_url() . $row['img_full'] . '"><img src="' . img_url() . $row['img_full'] . '" class="img-responsive" width="100%" alt="..." ></a></div>';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>      

            <!--end content--> 

        </div>
    </div>
</div>
<!--end main-->

<div id="howto" >
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
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="panel-group" id="accordion">
                            <div class="panel">
                                <div class="panel-heading">                                    
                                    <h4 class="panel-title">                                        
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">                                            
                                            สอบถามการสั่งซื้อ
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row placeholders">                                            
                                            <div class="col-lg-2 col-md-2  col-sm-4 col-xs-6 placeholder">
                                                <img src="<?php echo base_url() . 'assets/img/phone-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                <h5 class="style">089-532-9866</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 placeholder">
                                                <a href="https://www.facebook.com/BagAround/message">
                                                    <img src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">Bagaround</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 placeholder">
                                                <a href="#">
                                                    <img src="<?php echo base_url() . 'assets/img/line-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">ID : Bagaround</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>
                                            <div class="col-lg-2 col-md-2  col-sm-4 col-xs-6 placeholder">
                                                <a href="http://instagram.com/bagaround">
                                                    <img src="<?php echo base_url() . 'assets/img/Instagram-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">Bagaround</h5>
                                                <!--<span class="text-muted">Something else</span>-->                          

                                            </div>
                                            <div class="col-lg-2 col-md-2  col-sm-4 col-xs-6 placeholder">
                                                <a href="mailto:bagaround@hotmail.com">
                                                    <img src="<?php echo base_url() . 'assets/img/hotmail-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail" height="50%">
                                                </a>
                                                <h6 class="style">bagaround@hotmail.com</h6>
                                            </div>                                      

                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            ช่องทางการชำระเงิน
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        รอการยืนยัน ออเดอร์กลับจากทางร้านพร้อม และสามารถชำระเงินในช่องทางต่อไปนี้

                                        <div class="row">

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="placeholders center-block">
                                                    <div class="col-xs-6 col-sm-4 placeholder">
                                                        <img src="<?php echo base_url() . 'assets/img/scb.jpg'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                        <h4 class="style">405-064292-9</h4>
                                                        <span class="text-muted">
                                                            นพณัฐ วัฒน์หิรัญวงศ์
                                                            <br> 
                                                            สาขา อเวนิว รัชโยธิน
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-4 placeholder">
                                                        <img src="<?php echo base_url() . 'assets/img/kbank.jpg'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                        <h4 class="style">627-2-19798-7</h4>
                                                         <span class="text-muted">
                                                            นพณัฐ วัฒน์หิรัญวงศ์
                                                            <br> 
                                                            สาขา อเวนิว รัชโยธิน
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-4 placeholder">
                                                        <img src="<?php echo base_url() . 'assets/img/bkk.jpg'; ?>"class="img-responsive" alt="Generic placeholder thumbnail">
                                                        <h4 class="style">941-0-06252-6</h4>
                                                         <span class="text-muted">
                                                            นพณัฐ วัฒน์หิรัญวงศ์
                                                            <br> 
                                                            สาขา รัชโยธิน
                                                        </span>
                                                    </div>
                                                </div>   

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            ยืนยันการชำระเงิน
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">                                        
                                            หลังจากชำระเงินเสร็จเรียบร้อยเเล้ว กรุณาติดต่อทางร้านเพื่อยืนยันการชำระเงิน                                         
                                        <div class="row placeholders center-block">
                                            <div class="col-xs-6 col-sm-3 placeholder">
                                                <img src="<?php echo base_url() . 'assets/img/phone-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                <h5 class="style">089-532-9866</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>
                                            <div class="col-xs-6 col-sm-3 placeholder">
                                                <a href="https://www.facebook.com/BagAround/message">
                                                    <img src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">Bagaround</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>
                                            <div class="col-xs-6 col-sm-3 placeholder">
                                                <a href="#">
                                                    <img src="<?php echo base_url() . 'assets/img/line-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">ID : Bagaround</h5>
                                                <!--<span class="text-muted">Something else</span>-->
                                            </div>                                           
                                            <div class="col-xs-6 col-sm-3 placeholder">
                                                <a href="mailto:bagaround@hotmail.com">
                                                    <img src="<?php echo base_url() . 'assets/img/hotmail-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                                                </a>
                                                <h5 class="style">bagaround@hotmail.com</h5>
                                            </div>                                      

                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                            รับรหัสพัสดุ
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        ทางร้าน จะจัดส่งของให้พร้อมเเจ้งรหัสรับสอค้า หลังจากนั่นลูกค้าสามารถตรวจสอบสถานะ
                                        <!--                                        <div class="row hidden-xs">
                                                                                    <div class="col-sm-12 center-block">
                                                                                        <iframe border="0" marginwidth="0" framespacing="0" marginheight="0" 
                                                                                                src="http://track.thailandpost.co.th/trackinternet/Default.aspx" 
                                                                                                frameborder="0" 
                                                                                                scrolling="no" style="width: 100%; height: 600px;max-width: 100%">
                                                                                        </iframe>
                                                                                    </div>
                                                                                </div>                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>

<script>
    $(window).load(function() {
        $(window).scroll(function() {
            var pt_scroll = $(this).scrollTop() + 80;
            if (pt_scroll >= $('#content').offset().top) {
                $('#scroll-top').removeClass('hidden');
            } else {
                $('#scroll-top').addClass('hidden');
            }
        });

        $('#link_promotions').on('click', function(event) {
            $('html, body').animate({
                scrollTop: 0
            }, 1000);

        });

        $('#link_howto').on('click', function(event) {
            $('html, body').animate({
                scrollTop: $("#howto").offset().top
            }, 2000);

        });

        $(".fancybox").fancybox();
    });
</script>
<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a title="Scroll to top" id="link_promotions" style="color:#222;"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>




