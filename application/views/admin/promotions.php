<div class="row">
    <div class="page-header">
        <h1>
            <?= $title ?>
        </h1>
    </div>
</div>

<div class="row">  
    <?= anchor('Promotions/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;สร้างโปรโมชั่น', 'class="btn btn-success btn-lg pull-right"'); ?>      
</div>
<hr>
<div class="row">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th style="width: 5%"><label align="center" >สถานะ</label></th>
                <th style="width: 15%"><label align="center" >รูปภาพ</label></th>
                <th style="width: 15%"><label align="center" >ชื่อ</label></th>                                   
                <th style="width: 20%"><label align="center" >รายละเอียด</label></th>
                <th style="width: 30%"><label align="center" >สินค้า</label></th>                  
                <th style="width: 15%"></th>
            </tr>        
        </thead>
        <tbody>
            <?php

            function DateTimeDiff($strDateTime1, $strDateTime2) {
                return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 );
                // 1 Hour =  60*60
            }

            foreach ($promotions as $pro) {
                ?>
                <tr>
                    <td align="center"><?= DateTimeDiff($pro['start'], $pro['end']) / 24; ?></td>
                    <td  align="center" ><?= img($pro['img_full'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?></td>
                    <td>
                        <?= unserialize($pro['name'])['thai'] ?>
                        <hr>
                        <?= unserialize($pro['name'])['english'] ?>
                    </td>                
                    <td>  
                        <?= unserialize($pro['detail'])['thai'] ?>
                        <hr>
                        <?= unserialize($pro['detail'])['english'] ?>
                    </td>
                    <td>                        
                        <table class="table table-responsive">
                            <?php
                            foreach ($products_had_promotion as $p) {
                                if ($p['promotion_id'] == $pro['id']) {
                                    ?>
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">
                                            <?= img('holder.js/100x100/auto/sky', array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><?= unserialize($p['product_name'])['thai']; ?></li>
                                                <li>ราคา&nbsp;<?= $p['promotion_price'] ?>&nbsp;บาท</li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </td>
                    <td align="center"  style="vertical-align: middle;"> 
                        <?= anchor('promotions/edit/'.$pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                        <?= anchor('#', '<i class="fa fa-times fa-lg"></i>&nbsp;ยกเลิก', 'type="button" class="btn btn-danger btn-xs"') ?>
                    </td>
                </tr>

            <?php } ?>

<!--            <tr>
    <td>Active</td>
    <td  align="center" ><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
    <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>                
    <td><a href="#">Read more</a></td>
    <td>
        <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
    </td>
    <td> 
            <?anchor('Products/edit', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
            <? anchor('#', '<i class="fa fa-times fa-lg"></i>&nbsp;ยกเลิก', 'type="button" class="btn btn-danger btn-xs"') ?>
    </td>
</tr>-->
<!--            <tr>
                <td>unActive</td>
                <td><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>                
                <td><a href="#">Read more</a></td>   
                <td>                    
                    <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                    <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                    <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                    <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                    <img data-src="holder.js/50x50/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                </td>
                <td class="center-block">
                    <? anchor('Products/edit', '<i class="fa fa-refresh fa-lg"></i>&nbsp;เริ่มใหม่', 'class="btn btn-info btn-xs"') ?>
                    <? anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>      
                </td>
            </tr>-->

        </tbody>

    </table> 

</div>


