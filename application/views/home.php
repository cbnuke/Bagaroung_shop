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

                echo img($row['img_small']);
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
                        <div class="col-xs-12 col-sm-6 placeholder">
                            <img src="<?php echo base_url() . 'assets/img/phone-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4 class="style">089-532-9866</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 placeholder">
                            <a href="https://www.facebook.com/BagAround/message">
                                <img src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 placeholder">
                            <a href="#">
                                <img src="<?php echo base_url() . 'assets/img/line-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">ID : Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->
                        </div>
                        <div class="col-xs-12 col-sm-6 placeholder">
                            <a href="http://instagram.com/bagaround">
                                <img src="<?php echo base_url() . 'assets/img/Instagram-icon.png'; ?>" class="img-responsive" alt="Generic placeholder thumbnail">
                            </a>
                            <h4 class="style">Bagaround</h4>
                            <!--<span class="text-muted">Something else</span>-->                          

                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4><?= lang('head_contactus') ?></h4></div>
                        <div class="panel-body">
                            <!--Start Contact form -->	                    
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="txt_name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="txt_name" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txt_phone" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="txt_phone" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="txt_email" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="txt_message" class="col-sm-2 control-label">Comments</label>
                                    <div class="col-sm-10">                                
                                        <textarea rows="5" name="txt_message" id="txt_message" class="form-control"  placeholder="Comments" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Send Message" name="btn_submit" id="btn_submit" class="btn btn-info pull-right" title="Click here to submit your message!" />
                                    </div>
                                </div>
                            </form>
                            <!--End Contact form -->	
                        </div>
                    </div>	
                </div>
            </div>            
        </div>
    </div>
</div>


<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a href="#des_promotions" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>



