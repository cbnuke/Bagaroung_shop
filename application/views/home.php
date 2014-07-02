<div id="top_slide">   
    <!-- Carousel
 ================================================== -->
    <div id="banner_slide" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <!--<li data-target="#banner_slide" data-slide-to="0" class="active"></li>-->
            <?php
            $flag_slide = TRUE;
            foreach ($slide as $row) {
                if ($flag_slide) {
                    echo '<li data-target="#banner_slide" data-slide-to="' . $row['id'] . '" class="active"></li>';
                    $flag_slide = FALSE;
                } else {
                    echo '<li data-target="#banner_slide" data-slide-to="' . $row['id'] . '"></li>';
                }
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $flag_slide = TRUE;
            foreach ($slide as $row) {
                if ($flag_slide) {
                    echo '<div class="item active">';
                    $flag_slide = FALSE;
                } else {
                    echo '<div class="item">';
                }

                echo img($row['img_small']);
                echo '<div class="container"><div class="carousel-caption">';
                echo '<h2>' . unserialize($row['title'])[$language] . '</h2>';
                echo '<p>' . unserialize($row['subtitle'])[$language] . '</p>';
                if ($row['link_url'] != NULL || $row['link_url'] == '') {
                    echo '<div class="read_more pull-right" ><a  href="' . $row['link_url'] . '" role="button">' . lang('description') . '</a></div>';
                }
                echo '</div></div>';

                //End item
                echo '</div>';
            }
            ?>
        </div>
        <a class="left carousel-control" href="#banner_slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#banner_slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->


    <hr>
    <script>
        $(window).load(function() {
            $('#promotions_slide').carousel({
                interval: 10000
            });
            $(window).scroll(function() {
                var pt_scroll = $(this).scrollTop() + 80;
                if (pt_scroll >= $('#des_products').offset().top && pt_scroll <= ($('#des_products').offset().top + $('#des_products').height())) {
                    $('#scroll-top').removeClass('hidden');
                } else {
                    $('#scroll-top').addClass('hidden');
                }
            });

            $('#link_promotions').on('click', function(event) {
                $('html, body').animate({
                    scrollTop: $('#des_products').offset().top - 80
                }, 1000);

            });
        });
    </script>
</div>

<div id="des_promotions"> 
    <!-- start main promotions-->
    <div class="main_bg">
        <div class="container">
            <div class="main">
                <!--<h2 class="style"><?lang('head_promotions') ?></h2>-->
                <div class="row">
                    <?php
                    //Count number promotion
//                    $num = count($products_has_promotion);
                    $num = count($promotions);
                    if ($num >= 4) {
                        echo'<div class = "col-md-12">';
                        echo'<div id = "owl-4">';
                    } elseif ($num == 3) {
                        echo'<div class = "col-md-10 col-md-offset-1">';

                        echo'<div id = "owl-3">';
                    } elseif ($num == 2) {
                        echo'<div class = "col-md-6 col-md-offset-3">';
                        echo'<div id = "owl-2">';
                    } else {
                        echo'<div class = "col-md-3 col-md-offset-4">';
                        echo'<div id = "owl-1">';
                    }
//                    for ($i = 0; $i < $num; $i++) {
//                    foreach ($products_has_promotion as $p) {
                    foreach ($promotions as $p) {
                        echo'<div class = "item">';
                        echo'<div class = "row_has_3">';
                        echo'<a href="' . base_url('detailpromotion/id/' . $p['promotion_id']) . '" class="thumbnail">';
                        echo'<img src="' . img_url() . $p['img_small'] . '" alt="Image" style="max-width:100%;" class="img-responsive">';
                        echo'<span class = "price_pro bg1">' . lang('head_promotions') . '</span>';
                        echo'</a>';

                        echo'</div>';
                        echo'</div>';
                    }

                    echo'</div>';
                    echo'</div>';
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>


<div id="des_products">
    <div class="top_bg">
        <div class="container">
            <div class="main_top">
                <h2 class="style"><?= lang('head_products') ?></h2>
            </div>
        </div>
    </div>
    <!-- start main product-->
    <div class="main_bg">
        <div class="container">
            <div class="row main">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified">
                        <?php
                        $flag_first = TRUE;
                        foreach ($all_pro as $row) {
                            $type_name = unserialize($row['product_type']);
                            if ($flag_first) {
                                echo '<li class="active"><a href="#type' . $row['id'] . '" data-toggle="tab">' . $type_name[$language] . '</a></li>';
                                $flag_first = FALSE;
                            } else {
                                echo '<li><a href="#type' . $row['id'] . '" data-toggle="tab">' . $type_name[$language] . '</a></li>';
                            }
                        }
                        ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php
//Tab
                        $flag_first = TRUE;
                        foreach ($all_pro as $row) {
                            if ($flag_first) {
                                echo '<div class="tab-pane active" id="type' . $row['id'] . '">';
                                $flag_first = FALSE;
                            } else {
                                echo '<div class="tab-pane" id="type' . $row['id'] . '">';
                            }
                            echo '<div class="row">';
                            foreach ($row['list'] as $product) {
                                $product_name = unserialize($product['product_name']);
                                echo '<div class="col-md-4">';
                                echo '<div class="thumbnail row_has_3">';
                                echo '<a href="' . base_url('detailproduct/id/' . $product['id']) . '"data-toggle="tooltip" data-placement="bottom" title="' . lang('detail_product') . '">';
                                ?>
                                <img title="" src="<?= img_url() . $product['img_front'] ?>"
                                     onmouseover="this.src = '<?= img_url() . $product['img_back'] ?>'" 
                                     onmouseout="this.src = '<?= img_url() . $product['img_front'] ?>'" 
                                     />
                                     <?php
                                     echo '<h3>' . $product_name[$language] . '</h3>';
                                     echo '<span class="price"><strong>' . number_format($product['product_price'], 2) . '</strong><small>&nbsp;&nbsp;' . lang('baht') . '</small></span>';
                                     $dt_now = date('Y-m-d H:i:s');
                                     if ($product['status_promotion'] != 0 && $product['start'] <= $dt_now && $product['end'] >= $dt_now) {
                                         echo '<span class="price1 bg">on sale</span>';
                                     }
                                     echo '</a>';
                                     echo '</div>';
                                     echo '</div>';
                                 }
                                 echo '</div>';
                                 echo '</div>';
                             }
                             ?>
                    </div>   

                </div>

            </div>


        </div>
    </div>
</div>

<div id="des_contactus" > 
    <!-- sub header  -->
    <div  class="top_bg">
        <div class="container">
            <div class="main_top">
                <h2 class="style"><?= lang('head_contactus') ?></h2>
            </div>
        </div>
    </div>
    <!-- sub content -->
    <div  class="main_bg">
        <div class="container">
            <div class="row main">
                <div class="col-sm-6">   
                    <div class="row placeholders center-block">
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <img src="<?php echo base_url() . 'assets/img/phone-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4 class="style">089-532-9866</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <a href="https://www.facebook.com/BagAround/message">
                                <img src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/img/line-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">ID : Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-6 col-sm-6 placeholder">
                            <a href="http://instagram.com/bagaround">
                                <img src="<?php echo base_url() . 'assets/img/Instagram-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->     
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 placeholder">
                            <div class="col-xs-6 col-sm-6 col-sm-offset-3">
                                <a href="mailto:bagaround@hotmail.com">
                                    <img src="<?php echo base_url() . 'assets/img/hotmail-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail" height="50%">
                                </a>
                                <h4 class="style">bagaround@hotmail.com</h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row text-center hidden-xs">
                        <div class="fb-like-box" 
                             data-href="https://www.facebook.com/BagAround" 
                             data-colorscheme="light" 
                             data-show-faces="true" 
                             data-header="false" 
                             data-stream="true" 
                             data-show-border="true"
                             data-width="350px"
                             >
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
            </div>            
        </div>
    </div>
</div>


<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a title="Scroll to top" id="link_promotions" style="color:#222;"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>



