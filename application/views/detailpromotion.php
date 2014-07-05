
<!-- start top_bg -->
<section id="top-title">
    <div class="top_bg">
        <div class="container">
            <div class="main_top">
                <h2 class="style"><?= lang('head_promotions') ?></h2>
            </div>
        </div>
    </div>  
</section>

<section id="detail_promotion">
    <div class="main_bg">
        <div class="container">
            <div class="main">

                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= img_url() . $promotion['img_full'] ?>" alt="..." width="100%" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="detailed-info">
                            <h3 class="subtitle text-center"><?= unserialize($promotion['name'])[$language]; ?></h3>                            
                            <h4><?= lang('detail_promotion'); ?> </h4>
                            <?= unserialize($promotion['detail'])[$language]; ?>                      
                            <br>
                            <h4 class="text-center">
                                <span class="label label-default"><?= lang('expire') ?></span>                           
                                <strong><span class="text-danger"  >&nbsp;&nbsp;<?= $promotion ['end']; ?></span></strong>
                            </h4> 
                            <div class="top_main">                                
                                <a href="#products_pro"><?= lang('products_pro') ?></a>
                                <div class="clear"></div>
                            </div> 

                        </div>
                    </div>
                </div> 

                <div class="row center-block" id="products_pro" style="padding-top: 20px">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4><?= lang('products_pro'); ?></h4></div>
                        <div class="panel-body">                            
                            <table id="tb_products_promotion" class="table table-hover table-responsive" >
                                <thead>
                                    <tr>                                        
                                        <th align="center" style="width: 30%;" ></th>
                                        <th style="width: 20%;text-align: center"><?= lang('name'); ?></th>
                                        <th style="width: 15%;text-align: center"><?= lang('product_price'); ?></th>
                                        <th style="width: 25%;text-align: center"><?= lang('promotion_price'); ?></th>
                                        <th style="width: 10%;text-align: center"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($products == null || count($products) < 0) {
                                        echo '<tr><td colspan="4" >' . lang('no_product_pro') . '</td></tr>';
                                    } else {
                                        foreach ($products as $p) {
                                            $itemp = '<tr class="active">';
                                            $itemp .= '<td align="center">' . img('products/thumbs/' . $p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100%')) . '</td>';
                                            $itemp .= '<td>' . unserialize($p['product_name'])[$language] . '</td>';
                                            $itemp .= '<td align="center">' . $p['product_price'] . '</td>';
                                            $itemp .= '<td align="center"><span  class="text-danger"  ><h3>' . $p['promotion_price'] . '</h3></span></td>';
                                            $itemp .='<td>';
                                            $itemp .='<a href="' . base_url('DetailProduct/id/' . $p['id']) . '">' . lang('read_more') . '</a>';
                                            $itemp .='</td>';
                                            $itemp .= '</tr>';
                                            echo $itemp;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>  

            </div>
        </div>

    </div>	

</div>
</section>
<!--<section id='products_promotion'>   
    <div class="container">

        <div class="row" >
            <div class="main_top">
                <h3><? lang('products_pro') ?></h3> 
            </div>
        </div>

        <div class="row" style="padding-bottom: 5%;">
            <div class="col-md-12">
                <div class="row">
                    <?php
//                    if ($products == null || count($products) < 0) {
//                        echo '<p class="text-center">' . lang('no_product_pro') . '</p>';
//                    } else {
//                        foreach ($products as $p) {
                            ?>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <h3 class="subtitle"><?= unserialize($p['product_name'])[$language]; ?></h3>
                                    <p>This soft bovine leather has a fine grain effect. The leather is lightly finished 
                                        to protect the grain surface but will retain natural characteristics as it ages,
                                        making each product unique.
                                    </p>

                                    <div class="read_more pull-right" ><a  href="<? base_url('DetailProduct/id/' . $p['id']) ?>" role="button"><? lang('description') ?>...</a></div>                                    
                                </div>
                                <div class="col-md-6">
                                    <img src="<? img_url() . $promotion['img_full'] ?>" alt="..." width="100%" class="img-responsive">
                                </div>
                            </div> 
                            <?php
//                        }
//                    }
                    ?>


                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h3 class="subtitle">Soft Small Grain</h3>
                            <p>This soft bovine leather has a fine grain effect. The leather is lightly finished 
                                to protect the grain surface but will retain natural characteristics as it ages,
                                making each product unique.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="<? img_url() . $promotion['img_full'] ?>" alt="..." width="100%" class="img-responsive">
                        </div>
                    </div>  

                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h3 class="subtitle">Soft Small Grain</h3>
                            <p>This soft bovine leather has a fine grain effect. The leather is lightly finished 
                                to protect the grain surface but will retain natural characteristics as it ages,
                                making each product unique.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="<? img_url() . $promotion['img_full'] ?>" alt="..." width="100%" class="img-responsive">
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="col-md-6">
                            <h3 class="subtitle">Soft Small Grain</h3>
                            <p>This soft bovine leather has a fine grain effect. The leather is lightly finished 
                                to protect the grain surface but will retain natural characteristics as it ages,
                                making each product unique.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="<? img_url() . $promotion['img_full'] ?>" alt="..." width="100%" class="img-responsive">
                        </div>
                    </div> 
                </div>

            </div>
        </div>

    </div>
</div>
</section>-->

<!-- start main -->
<div class="clearfix visible-xs-block"></div>

<section id="recommed">
    <div class="main_bg" style="padding-bottom: 3%;">
        <div class="container">
            <div class="main_top">
                <div class="col-md-12">
                    <div class="row  hidden-xs">                     
                        <div class="title-recommed">
                            <h4 class="style"><?= lang('recommend') ?></h4>
                        </div>
                        <div id = "owl-recommend">  
                            <?php
                            foreach ($recommend as $row) {
                                ?>     
                                <div class="placeholder thumbnail item">
                                    <a href="<?php echo base_url('DetailProduct/id/' . $row['id']); ?>">  
                                        <img title="<?= lang('detail_product'); ?>" src="<?= img_url() . 'products/thumbs/' . $row['img_front'] ?>"
                                             onmouseover="this.src = '<?= img_url() . 'products/thumbs/' . $row['img_back'] ?>'" 
                                             onmouseout="this.src = '<?= img_url() . 'products/thumbs/' . $row['img_front'] ?>'" 
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
</section>

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
        $("#owl-recommend").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 4,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 4],
            itemsTablet: [768, 4], //1 items between 768 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option



        });
    });
</script>
<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a title="Scroll to top" id="link_promotions" style="color:#222;"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>







