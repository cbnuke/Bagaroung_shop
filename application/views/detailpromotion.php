<?php
//	$strDate = "2008-08-14 13:42:44";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<!-- start top_bg -->
<div class="top_bg">
    <div class="wrap">
        <div class="main_top">
            <h2 class="style"><?= lang('head_promotions') ?></h2>
        </div>
    </div>
</div>
<!-- start main -->
<div class="main_bg">
    <div class="wrap">
        <div class="row">
            <!-- start right_sidebar -->
            <div class="col-md-2">
                <div class="row hidden-sm hidden-xs">                
                    <div class="col-md-12">
                        <div class="row">
                            <h3><? lang('recommend') ?></h3>
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
                                    ?>                                 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end right_sidebar --> 
            <!-- start content -->         
            <div class="col-md-10" style="padding-top: 25px">

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
                                <h4 class="media-heading"><?= lang('detail_promotion'); ?> </h4>
                                <div class="media-body"> 
                                    <?= unserialize($promotion['detail'])[$language]; ?>                                   
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>                       

                        <div class="row">
                            <div class="top_main">                                
                                <a href="#products_pro"><?= lang('products_pro') ?></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">
                            <h3><span class="label label-warning"><?= lang('expire') ?></span></h3>   
                            <div class="text-danger text-center">
                                <h4><?= $promotion ['end']; ?></h4>                                    
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- end content -->
        <div class="row" id="products_pro" style="padding-top: 20px">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><?= lang('products_pro'); ?></h2></div>
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

</div>





