<?php
//	$strDate = "2008-08-14 13:42:44";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<!-- start top_bg -->
<div class="top_bg">
    <div class="container">
        <div class="main_top">
            <h2 class="style"><?= lang('head_promotions') ?></h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="container">
        <div class="row">
            <!-- start right_sidebar -->
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                <div class="row ">                
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
            <div id="content" class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="padding-top: 25px">

                <div class="row">                        
                    <div class="col-md-6 bg">
                        <div class="">
                            <img src="<?= img_url() . $promotion['img_full'] ?>" alt="..." class="img-responsive">
                        </div>                           
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="text-center">
                                <h2><?= unserialize($promotion['name'])[$language]; ?></h2>
                            </div>
                        </div>                 
                        <div class="row">
                            <div class="media">    
                                <h4 class="media-heading">
                                    <dt>
                                    <?= lang('detail_promotion'); ?> 
                                    </dt>
                                </h4>
                                <div class="media-body">  
                                    <blockquote>
                                        <?= unserialize($promotion['detail'])[$language]; ?>   
                                    </blockquote>                                
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>                       
                        <div class="row">
                            <dl class="dl-horizontal">
                                <h4 class="style">
                                    <dt> <span class="label label-warning"><?= lang('expire') ?></span></dt>
                                    <dd><span class="text-danger"  ><?= $promotion ['end']; ?></span></dd>
                                </h4>   
                            </dl>
                            <div class="clear"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top_main">                                
                                    <a href="#products_pro"><?= lang('products_pro') ?></a>
                                    <div class="clear"></div>
                                </div>
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
                                            $itemp .= '<td align="center">' . img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100%')) . '</td>';
                                            $itemp .= '<td>' . unserialize($p['product_name'])[$language] . '</td>';
                                            $itemp .= '<td align="center">' . $p['product_price'] . '</td>';
                                            $itemp .= '<td align="center"><span  class="text-danger"  ><h3>' . $p['promotion_price'] . '</h3></span></td>';
                                            $itemp .='<td>';
                                            $itemp .='<a href="' . base_url('detailproduct/id/' . $p['id']) . '">' . lang('read_more') . '</a>';
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
        <!-- end content -->
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
    });
</script>
<ul class="nav pull-right scroll-top hidden" id="scroll-top">
    <li><a title="Scroll to top" id="link_promotions" style="color:#222;"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>







