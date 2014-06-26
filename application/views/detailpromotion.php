<!--<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="row hidden-sm hidden-xs">                
                <div class="col-md-12">
                    <div class="row">
                        <h3><? lang('recommend') ?></h3>
                        <div class="col-md-12">
<?php
//                            foreach ($recommend as $row) {
//                                echo '<a href="' . $row['id'] . '" class="thumbnail">';
//                                echo '<img src="' . img_url() . $row['img_front'] . '" alt="..." >';
//                                echo '<div class="caption">';
//                                echo '<h4>' . unserialize($row['product_name'])[$language] . '</h4>';
//                                echo '<p>' . lang('product_price') . ' ' . number_format($row['product_price'], 2) . ' ' . lang('baht') . '</p>';
//                                echo '</div>';
//                                echo '</a>';
//                            }
?>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row"></div>
        </div>
    </div>

</div>-->
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
                            <img src="<?= img_url() . $promotion['img_full'] ?>" alt="..." class="img-responsive">';
                        </div>                           
                    </div>
                    <div class="col-md-6">
                        <div class="row">                            
                            <div class="top_main">
                                <h2><?= unserialize($promotion['name'])[$language]; ?></h2>
                                <a href="#products_pro"><?= lang('products_pro') ?></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">                            
                            <dt> <?= lang('detail_promotion'); ?>  </dt>                              
                            <dd> <?= unserialize($promotion['detail'])[$language]; ?></dd>                        
                        </div>
                        <div class="row">
                            <div class="grid_date">
                                <div class="date1"> 
                                    <h4><?= lang('start') ?></h4>
                                </div>
                                <div class="date_text">
                                    <h4><?= $promotion ['start'] ?></h4>                                    
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="grid_date">
                                <div class="date1"> 
                                    <h4><?= lang('expire') ?></h4>
                                </div>
                                <div class="date_text">
                                    <h4><?= $promotion ['end'] ?></h4>                                    
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="row">

                        </div>                       
                    </div>

                </div>
                <div class="row" id="products_pro">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h2><?= lang('products_pro'); ?></h2></div>
                        <div class="panel-body">                            
                            <table id="tb_products_promotion" class="table table-responsive" >
                                <thead>
                                    <tr>                                        
                                        <th align="center" style="width: 30%;" ></th>
                                        <th style="width: 30%;text-align: center">ชื่อ</th>
                                        <th style="width: 15%;text-align: center"><?= lang('product_price'); ?></th>
                                        <th style="width: 25%;text-align: center"><?= lang('promotion_price'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($products == null || count($products) < 0) {
                                        echo '<tr><td colspan="4" >' . lang('no_product_pro') . '</td></tr>';
                                    } else {
                                        foreach ($products as $p) {
                                            $itemp = '<tr>';
                                            $itemp .= '<td align="center">' . img($p['img_front'], array('class' => 'img-responsive thumbnail')) . '</td>';
                                            $itemp .= '<td>' . unserialize($p['product_name'])[$language] . '</td>';
                                            $itemp .= '<td align="center">' . $p['product_price'] . '</td>';
                                            $itemp .= '<td align="center">' . $p['promotion_price'] . '</td>';
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

</div>





