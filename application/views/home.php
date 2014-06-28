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
<!--            <div class="item active">
                <img src="http://lorempixel.com/1500/500/"  class="img-responsive">
                <div class="wrap">
                    <div class="carousel-caption">
                        <h2>Bootstrap 3 Carousel Layout</h2>                       
                        <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                        <div class="read_more pull-right" >
                            <a  href="http://getbootstrap.com">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>-->
            
              
            <?php
            $flag_slide = TRUE;
            foreach ($slide as $row) {
                if ($flag_slide) {
                    echo '<div class="item active">';
                    $flag_slide = FALSE;
                } else {
                    echo '<div class="item">';
                }

                echo img($row['img_full']);
                echo '<div class="container"><div class="carousel-caption">';
                echo '<h2>' . unserialize($row['title'])[$language] . '</h2>';
                echo '<p>' . unserialize($row['subtitle'])[$language] . '</p>';
                echo '<div class="read_more pull-right" ><a  href="' . $row['link_url'] . '" role="button">' . lang('description') . '</a></div>';
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
        });
    </script>
</div>

<div id="des_promotions"> 
    <!-- start main promotions-->
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <!--<h2 class="style"><?lang('head_promotions') ?></h2>-->
                <div class="row">
                    <?php
                    //Count number promotion
                    $num = count($products_has_promotion);
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
                    foreach ($products_has_promotion as $p) {
                        echo'<div class = "item">';
                        echo'<div class = "row_has_3">';
                        echo'<a href="' . base_url('detailpromotion/id/' . $p['promotion_id']) . '" class="thumbnail">';
                        echo'<img src="' . img_url() . $p['img_right'] . '" alt="Image" style="max-width:100%;" class="img-responsive">';
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
<!--                    <div id="promotions_slide" class="carousel slide">
                        <ol class="carousel-indicators">
<?php
//                    //Count number promotion
//                    $num = count($products_has_promotion);
//                    //Number indicators
//                    $count = $num / 4;
//                    for ($i = 0; $i < $count; $i++) {
//                        echo '<li data-target="#promotions_slide" data-slide-to="' . $i . '"></li>';
//                    }
?>

                        </ol>
                         Carousel items 
                        <div class="carousel-inner">
<?php
//                            $all_promotion = 20;
//                            $flag_first = TRUE;
//                            $i = 0;
////                        for ($i = 0; $i < $all_promotion; $i++) {                        
//                            foreach ($products_has_promotion as $p) {
//                                //Start item and row
//                                if ($i % 4 == 0) {
//                                    if ($flag_first) {
//                                        echo '<div class="item active"><div class="row">';
//                                        $flag_first = FALSE;
//                                    } else {
//                                        echo '<div class="item"><div class="row">';
//                                    }
//                                }
//
//                                //Show single product
//                                echo '<div class="col-sm-3 col-xs-6">';
//                                echo '<a href="' . base_url('detailpromotion/id/' . $p['promotion_id']) . '" class="thumbnail">';
//                                echo '<img src="' . img_url() . $p['img_front'] . '" alt="Image" style="max-width:100%;" class="img-responsive">';
//                                echo '</a></div>';
//
//                                //Close item and row
//                                if ($i % 4 == 3) {
//                                    echo '</div></div>';
//                                }
//                                $i++;
//                            }
?>
                        </div>
                        /carousel-inner 
                        <a class="left carousel-control"  href="#promotions_slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="right carousel-control" href="#promotions_slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>-->
<!--test promotion-->
<!--                    <div class="row"  >                        
                        --start-promotion-cursual--
                        <div id="owl-demo" class="center-block">
                            <div class="item">
                                <div class="row_has_3">
                                    <a href="" class="thumbnail"> 
                                        <img src="http://placehold.it/500x350" class="img-responsive" alt="...">                                        
                                        <span class="price_pro bg1">promotion</span>
                                    </a>
                                </div>                                
                            </div>                            

                        </div>
                        --//End-promotion-cursual--
                        
                    </div>-->

<!--                    <div class="col-sm-3 col-xs-6">
                        <div class="thumbnail row_has_3">
                            <a href=""> 
                                <img src="http://placehold.it/500x350" class="img-responsive" alt="...">  
                                <span class="price_promotion">$145,99</span>
                                <span class="price1 bg1">promotion </span>
                            </a>
                        </div>
                    </div>-->

<!--end test promotion-->


<div id="des_products">
    <div class="top_bg">
        <div class="wrap">
            <div class="main_top">
                <h2 class="style"><?= lang('head_products') ?></h2>
            </div>
        </div>
    </div>
    <!-- start main product-->
    <div class="main_bg">
        <div class="wrap">
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
                                     if ($product['status_promotion'] != 0) {
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
                <!--start test-->                

                <!--                <div class="col-md-12">
                                    <div class="row">                    
                                        <div class="col-md-4">
                                            <div class="thumbnail row_has_3">
                                                <img src="http://placehold.it/500x350" class="img-responsive" alt="...">
                                                <a href="">
                                                    <h3>even &amp; odd</h3>
                                                    <span class="price">$145,99</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail row_has_3">
                                                <img src="http://placehold.it/500x350"  alt="...">
                                                <a href="" class="">
                                                    <h3>buffalo decollete</h3>
                                                    <span class="price">$185,99</span>
                                                    <span class="price1 bg">on sale</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail row_has_3">
                                                <img src="http://placehold.it/500x350" class="img-responsive" alt="...">
                                                <a href="" data-toggle="tooltip" data-placement="bottom" title="<?= lang('detail_product'); ?> ">
                                                    <h3>even &amp; odd</h3>
                                                    <span class="price">$145,99</span>
                                                    <span class="price1 bg1">out of stock</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div> 
                
                                </div>-->

                <!--                <div class="row">    
                                    <img title="Hello" src="http://localhost/Bagaroung_shop/assets/img/products/092e727f6396942a2279e5d2d731ab76.jpg"
                                         onmouseover="this.src = 'http://localhost/Bagaroung_shop/assets/img/products/191ef50fb03982c42fd20687ef0da006.jpg'" 
                                         onmouseout="this.src = 'http://localhost/Bagaroung_shop/assets/img/products/092e727f6396942a2279e5d2d731ab76.jpg'" />
                
                                </div>-->
                <!--end test-->   

            </div>


        </div>
    </div>
</div>

<div id="des_contactus" > 
    <!-- sub header  -->
    <div  class="top_bg">
        <div class="wrap">
            <div class="main_top">
                <h2 class="style"><?= lang('head_contactus') ?></h2>
            </div>
        </div>
    </div>
    <!-- sub content -->
    <div  class="main_bg">
        <div class="wrap">
            <div class="row main" style="height: 1000px;">
                เบอร์
            </div>
        </div>
    </div>
</div>

<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a href="#des_promotions" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>



