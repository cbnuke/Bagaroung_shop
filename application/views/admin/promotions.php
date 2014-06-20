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
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#all" data-toggle="tab">โปรโมชั่นทั้งหมด</a></li>
            <li><a href="#curent" data-toggle="tab">โปรโมรชั่นปัจจุบัน</a></li>
            <li><a href="#expire" data-toggle="tab">โปรโมชั่นหมดอายุ</a></li>
        </ul>
        <?php

        function DateTimeDiff($strDateTime1, $strDateTime2) {
            return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
        }
        ?>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <div class="row">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 5%"><label align="center" >สถานะวันคงเหลือ</label></th>
                                <th style="width: 15%"><label align="center" >รูปภาพ</label></th>
                                <th style="width: 15%"><label align="center" >ชื่อ</label></th>                                   
                                <th style="width: 20%"><label align="center" >รายละเอียด</label></th>
                                <th style="width: 30%"><label align="center" >สินค้า</label></th>                  
                                <th style="width: 15%"></th>
                            </tr>        
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promotions as $pro) {
                                $now = date("Y-m-d H:i:s");
                                $diff = DateTimeDiff($now, $pro['end']);
                                $day = round($diff / 24);
                                $hours = round($diff - ($day * 24));
                                $status = $pro['status_promotion'];
                                ?>
                                <tr class="active">
                                    <td align="center"  style="vertical-align: middle;"> <?= $day . ' วัน<br>' . $hours . ' ชั่วโมง' ?></td>
                                    <td align="center"  style="vertical-align: middle;"> <?= img($pro['img_full'], array('class' => 'img-responsive', 'width' => '100', 'height' => '200')); ?></td>
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
                                                            <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
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
                                        <?php
                                        echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                        if ($status == 0 && $diff > 0) {
                                            echo anchor('promotions/active/' . $pro['id'], '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', array('type' => "button", 'class' => "btn btn-success btn-xs", 'onclick' => "javascript : return confirm('เริ่มโปรโมชั้น');"));
                                        } elseif ($status == 1 && $diff > 0) {
                                            echo anchor('promotions/cancle/' . $pro['id'], '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', array('type' => "button", 'class' => "btn btn-danger btn-xs", 'onclick' => "javascript : return confirm('ยกเลิกโปรโมชั้น');"));
                                        } else {
                                            echo anchor('promotions/delete/' . $pro['id'], '<i class="fa fa-trash fa-lg"></i>&nbsp;ลบ', array('type' => "button", 'class' => "btn btn-danger btn-xs", 'onclick' => "javascript : return confirm('ลบโปรโมชั้น');"));
                                        }
                                        ?>

                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>

                    </table> 
                </div>

            </div>
            <div class="tab-pane" id="curent">
                <div class="row">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 5%"><label align="center" >สถานะวันคงเหลือ</label></th>
                                <th style="width: 15%"><label align="center" >รูปภาพ</label></th>
                                <th style="width: 15%"><label align="center" >ชื่อ</label></th>                                   
                                <th style="width: 20%"><label align="center" >รายละเอียด</label></th>
                                <th style="width: 30%"><label align="center" >สินค้า</label></th>                  
                                <th style="width: 15%"></th>
                            </tr>        
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promotions as $pro) {
                                $now = date("Y-m-d H:i:s");
                                $diff = DateTimeDiff($now, $pro['end']);
                                $day = round($diff / 24);
                                $hours = round($diff - ($day * 24));
                                $status = $pro['status_promotion'];
                                if ($diff > 0 && $status == 1) {
                                    ?>
                                    <tr>
                                        <td align="center"  style="vertical-align: middle;"> <?= $day . ' วัน<br>' . $hours . ' ชั่วโมง' ?></td>
                                        <td align="center"  style="vertical-align: middle;"> <?= img($pro['img_full'], array('class' => 'img-responsive', 'width' => '100', 'height' => '200')); ?></td>
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
                                                                <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '200')); ?>
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
                                            <?= anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                                            <?= anchor('promotions/cancle/' . $pro['id'], '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', array('type' => "button", 'class' => "btn btn-danger btn-xs", 'onclick' => "javascript : return confirm('ยกเลิกโปรโมชั้น');")) ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>

                    </table> 
                </div>
            </div>
            <div class="tab-pane" id="expire">
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
                            foreach ($promotions as $pro) {
                                $now = date("Y-m-d H:i:s");
                                $diff = DateTimeDiff($now, $pro['end']);
                                $status = $pro['status_promotion'];
                                if ($diff / 24 <= 0 || $status == 0) {
                                    ?>
                                    <tr>
                                        <td align="center"  style="vertical-align: middle;"> <?= '0 วัน' ?></td>
                                        <td align="center"  style="vertical-align: middle;"> <?= img($pro['img_full'], array('class' => 'img-responsive', 'width' => '100', 'height' => '200')); ?></td>
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
                                                                <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
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
                                            <?php
                                            echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                            if ($status == 0 && $diff > 0) {
                                                echo anchor('promotions/active/' . $pro['id'], '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', array('type' => "button", 'class' => "btn btn-success btn-xs", 'onclick' => "javascript : return confirm('เริ่มโปรโมชั้น');"));
                                            } elseif ($diff < 0) {
                                                echo anchor('promotions/delete/' . $pro['id'], '<i class="fa fa-trash fa-lg"></i>&nbsp;ลบ', array('type' => "button", 'class' => "btn btn-danger btn-xs", 'onclick' => "javascript : return confirm('ลบโปรโมชั้น');"));
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
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

