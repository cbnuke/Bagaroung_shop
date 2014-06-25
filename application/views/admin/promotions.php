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
<br>
<div class="row"> 
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li><a href="#all" data-toggle="tab">โปรโมชั่นทั้งหมด</a></li>
            <li class="active" ><a href="#curent" data-toggle="tab">โปรโมรชั่นปัจจุบัน</a></li>
            <li><a href="#expire" data-toggle="tab">โปรโมชั่นหมดอายุ</a></li>
        </ul>
        <?php

        function DateTimeDiff($strDateTime1, $strDateTime2) {
            return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
        }
        ?>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="all">
                <div class="row">
                    <table class="table table-hover table-condensed table-bordered table-responsive">
                        <thead>
                            <tr>
                                <!--<th style="width: 3%;" >สถานะ</th>-->
                                <th style="width: 5% ;">วันคงเหลือ</th>
                                <th style="width: 15%;">รูปภาพ</th>
                                <th style="width: 15%;">ชื่อ</th>                                   
                                <th style="width: 20%;">รายละเอียด</th>
                                <th colspan="2">สินค้า</th>                  
                                <th style="width: 15%;"></th>
                            </tr>        
                        </thead>
                        <tbody>                        
                            <!------------------------------------------------------------------------------------------------------------------------------------------>
                            <?php
                            if (count($promotions) == 0 || $promotions == NULL) {
                                echo '<tr><td colspan="7" align="center">ไม่พบโปรโมชั่นในระบบ</td></tr>';
                            } else {
                                $i = 0;
                                foreach ($promotions as $pro) {
                                    $num = $pro['count_product'];
                                    $now = date("Y-m-d H:i:s");
                                    $diff = DateTimeDiff($now, $pro['end']);
                                    $day = round($diff / 24);
                                    $hours = round($diff - ($day * 24));
                                    $status = $pro['status_promotion'];

                                    if ($status == '1' && $diff > 0) {
                                        echo '<tr class="success">';
//                                     echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-check-square-o fa-lg"></i></td>';
                                    } elseif ($status == '0' && $diff > 0) {
                                        echo '<tr class="warning">';
//                                     echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-square-o fa-lg"></i></td>';
                                    } else {
                                        echo '<tr>';
//                                     echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-square-o fa-lg"></i></td>';
                                    }
                                    ?>                                                       
                                <td rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= $day . ' วัน<br>' . $hours . ' ชั่วโมง' ?></td>
                                <td  rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= img($pro['img_small'], array('class' => 'img-responsive')); ?></td>

                                <td rowspan="<?= $num; ?>">
                                    <?= unserialize($pro['name'])['thai'] ?>
                                    <hr>
                                    <?= unserialize($pro['name'])['english'] ?>
                                </td>
                                <td rowspan="<?= $num; ?>">
                                    <?= unserialize($pro['detail'])['thai'] ?>
                                    <hr>
                                    <?= unserialize($pro['detail'])['english'] ?>
                                </td> 
                                <?php
                                $delete = array(
                                    'type' => "button",
                                    'class' => "btn btn-danger btn-xs",
                                    'data-id' => "2",
                                    'data-title' => "ลบ",
                                    'data-info' => unserialize($pro['name'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'promotions/delete/' . $pro['id'],
                                );
                                $cancle = array(
                                    'type' => "button",
                                    'class' => "btn btn-warning btn-xs",
                                    'data-id' => "3",
                                    'data-title' => "ยกเลิก",
                                    'data-info' => unserialize($pro['name'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'promotions/cancle/' . $pro['id'],
                                );
                                $active = array(
                                    'type' => "button",
                                    'class' => "btn btn-success btn-xs",
                                    'data-id' => "4",
                                    'data-title' => "ใช้งาน",
                                    'data-info' => unserialize($pro['name'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'promotions/active/' . $pro['id'],
                                );

                                if ($num == 0) {
                                    echo '<td colspan="2"  align="center"  style="vertical-align: middle;">ไม่มีสินค้าในโปรโมชั่น </td>';
                                    echo '<td align="center"  style="vertical-align: middle;" rowspan="' . $num . '"> ';
                                    echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                    if ($status == 0 && $diff > 0) {
                                        echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                    } elseif ($status == 1 && $diff > 0) {
                                        echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                    } else {
                                        echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                } else {
                                    $product_id_frist = '';
                                    foreach ($products_had_promotion as $p) {
                                        if ($p['promotion_id'] == $pro['id'] && $product_id_frist == '') {
                                            $product_id_frist = $p['product_id'];
                                            ?>
                                            <td align="center" style="vertical-align: middle;">
                                                <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li><?= unserialize($p['product_name'])['thai']; ?></li>
                                                    <li>ราคา&nbsp;<?= $p['promotion_price'] ?>&nbsp;บาท</li>
                                                </ul>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>                                
                                    <td align="center"  style="vertical-align: middle;" rowspan="<?= $num; ?>"> 
                                        <?php
                                        echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                        if ($status == 0 && $diff > 0) {
                                            echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                        } elseif ($status == 1 && $diff > 0) {
                                            echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                        } else {
                                            echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                        }
                                        ?>
                                    </td>
                                    </tr>


                                    <?php
                                    if ($i != 0) {
                                        foreach ($products_had_promotion as $p) {
                                            if ($p['promotion_id'] == $pro['id'] && $p['product_id'] != $product_id_frist) {
                                                if ($status == '1' && $diff > 0) {
                                                    echo '<tr class="success">';
                                                } elseif ($status == '0' && $diff > 0) {
                                                    echo '<tr class="warning">';
                                                } else {
                                                    echo '<tr>';
                                                }
                                                ?>
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
                                    }
                                    ?>



                                    <?php
                                }
                                $i++;
                            }
                        }
                        ?>
                        <!------------------------------------------------------------------------------------------------------------------------------------------>
                        </tbody>

                    </table> 
                </div>

            </div>

            <div class="tab-pane active" id="curent">
                <div class="row">
                    <table class="table table-hover table-condensed table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 5% ;">วันคงเหลือ</th>
                                <th style="width: 15%;">รูปภาพ</th>
                                <th style="width: 15%;">ชื่อ</th>                                   
                                <th style="width: 20%;">รายละเอียด</th>
                                <th colspan="2">สินค้า</th>                  
                                <th style="width: 15%;"></th>
                            </tr>        
                        </thead>
                        <tbody>
                            <?php
                            if (count($promotions) == 0 || $promotions == NULL) {
                                echo '<tr><td colspan="7" align="center">ไม่พบโปรโมชั่นในระบบ</td></tr>';
                            } else {
                                foreach ($promotions as $pro) {
                                    $num = $pro['count_product'];
                                    $now = date("Y-m-d H:i:s");
                                    $diff = DateTimeDiff($now, $pro['end']);
                                    $day = round($diff / 24);
                                    $hours = round($diff - ($day * 24));
                                    $status = $pro['status_promotion'];
                                    if ($diff > 0 && $status == 1) {
                                        ?>
                                        <tr>
                                            <td rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= $day . ' วัน<br>' . $hours . ' ชั่วโมง' ?></td>
                                            <td  rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= img($pro['img_small'], array('class' => 'img-responsive')); ?></td>

                                            <td rowspan="<?= $num; ?>">
                                                <?= unserialize($pro['name'])['thai'] ?>
                                                <hr>
                                                <?= unserialize($pro['name'])['english'] ?>
                                            </td>
                                            <td rowspan="<?= $num; ?>">
                                                <?= unserialize($pro['detail'])['thai'] ?>
                                                <hr>
                                                <?= unserialize($pro['detail'])['english'] ?>
                                            </td> 
                                            <?php
                                            $delete = array(
                                                'type' => "button",
                                                'class' => "btn btn-danger btn-xs",
                                                'data-id' => "2",
                                                'data-title' => "ลบ",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/delete/' . $pro['id'],
                                            );
                                            $cancle = array(
                                                'type' => "button",
                                                'class' => "btn btn-warning btn-xs",
                                                'data-id' => "3",
                                                'data-title' => "ยกเลิก",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/cancle/' . $pro['id'],
                                            );
                                            $active = array(
                                                'type' => "button",
                                                'class' => "btn btn-success btn-xs",
                                                'data-id' => "4",
                                                'data-title' => "ใช้งาน",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/active/' . $pro['id'],
                                            );


                                            if ($num == 0) {
                                                echo '<td colspan="2"  align="center"  style="vertical-align: middle;">ไม่มีสินค้าในโปรโมชั่น </td>';
                                                echo '<td align="center"  style="vertical-align: middle;" rowspan="' . $num . '"> ';
                                                echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                                if ($status == 0 && $diff > 0) {
                                                    echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                                } elseif ($status == 1 && $diff > 0) {
                                                    echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                                } else {
                                                    echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                                }
                                                echo '</td>';
                                                echo '</tr>';
                                            } else {
                                                $product_id_frist = '';
                                                foreach ($products_had_promotion as $p) {
                                                    if ($p['promotion_id'] == $pro['id'] && $product_id_frist == '') {
                                                        $product_id_frist = $p['product_id'];
                                                        ?>
                                                        <td align="center" style="vertical-align: middle;">
                                                            <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li><?= unserialize($p['product_name'])['thai']; ?></li>
                                                                <li>ราคา&nbsp;<?= $p['promotion_price'] ?>&nbsp;บาท</li>
                                                            </ul>
                                                        </td>
                                                        <?php
                                                    }
                                                }
                                                ?>                                
                                                <td align="center"  style="vertical-align: middle;" rowspan="<?= $num; ?>"> 
                                                    <?php
                                                    echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                                    if ($status == 0 && $diff > 0) {
                                                        echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                                    } elseif ($status == 1 && $diff > 0) {
                                                        echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                                    } else {
                                                        echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                                    }
                                                    ?>
                                                </td>
                                            </tr>


                                            <?php
                                            if ($i != 0) {
                                                foreach ($products_had_promotion as $p) {
                                                    if ($p['promotion_id'] == $pro['id'] && $p['product_id'] != $product_id_frist) {
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
                                            }
                                            ?>



                                            <?php
                                        }
                                        $i++;
                                    }
                                }
                            }
                            ?>

                        </tbody>

                    </table> 
                </div>
            </div>

            <div class="tab-pane" id="expire">
                <div class="row">
                    <table class="table table-hover table-condensed table-bordered table-responsive">
                        <thead>

                            <tr>
                                <th style="width: 5% ;">วันคงเหลือ</th>
                                <th style="width: 15%;">รูปภาพ</th>
                                <th style="width: 15%;">ชื่อ</th>                                   
                                <th style="width: 20%;">รายละเอียด</th>
                                <th colspan="2">สินค้า</th>                  
                                <th style="width: 15%;"></th>
                            </tr>  

                        </thead>
                        <tbody>
                            <?php
                            if (count($promotions) == 0 || $promotions == NULL) {
                                echo '<tr><td colspan="7" align="center">ไม่พบโปรโมชั่นในระบบ</td></tr>';
                            } else {
                                foreach ($promotions as $pro) {
                                    $num = $pro['count_product'];
                                    $now = date("Y-m-d H:i:s");
                                    $diff = DateTimeDiff($now, $pro['end']);
                                    $status = $pro['status_promotion'];
                                    if ($diff / 24 <= 0 || $status == 0) {
                                        ?>
                                        <tr>
                                            <td rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= $day . ' วัน<br>' . $hours . ' ชั่วโมง' ?></td>
                                            <td  rowspan="<?= $num; ?>" align="center"  style="vertical-align: middle;"> <?= img($pro['img_small'], array('class' => 'img-responsive')); ?></td>

                                            <td rowspan="<?= $num; ?>">
                                                <?= unserialize($pro['name'])['thai'] ?>
                                                <hr>
                                                <?= unserialize($pro['name'])['english'] ?>
                                            </td>
                                            <td rowspan="<?= $num; ?>">
                                                <?= unserialize($pro['detail'])['thai'] ?>
                                                <hr>
                                                <?= unserialize($pro['detail'])['english'] ?>
                                            </td> 
                                            <?php
                                            $delete = array(
                                                'type' => "button",
                                                'class' => "btn btn-danger btn-xs",
                                                'data-id' => "2",
                                                'data-title' => "ลบ",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/delete/' . $pro['id'],
                                            );
                                            $cancle = array(
                                                'type' => "button",
                                                'class' => "btn btn-warning btn-xs",
                                                'data-id' => "3",
                                                'data-title' => "ยกเลิก",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/cancle/' . $pro['id'],
                                            );
                                            $active = array(
                                                'type' => "button",
                                                'class' => "btn btn-success btn-xs",
                                                'data-id' => "4",
                                                'data-title' => "ใช้งาน",
                                                'data-info' => unserialize($pro['name'])['thai'],
                                                'data-toggle' => "modal",
                                                'data-target' => "#confirm",
                                                'data-href' => 'promotions/active/' . $pro['id'],
                                            );

                                            if ($num == 0) {
                                                echo '<td colspan="2"  align="center"  style="vertical-align: middle;">ไม่มีสินค้าในโปรโมชั่น </td>';
                                                echo '<td align="center"  style="vertical-align: middle;" rowspan="' . $num . '"> ';
                                                echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                                if ($status == 0 && $diff > 0) {
                                                    echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                                } elseif ($status == 1 && $diff > 0) {
                                                    echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                                } else {
                                                    echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                                }
                                                echo '</td>';
                                                echo '</tr>';
                                            } else {
                                                $product_id_frist = '';
                                                foreach ($products_had_promotion as $p) {
                                                    if ($p['promotion_id'] == $pro['id'] && $product_id_frist == '') {
                                                        $product_id_frist = $p['product_id'];
                                                        ?>
                                                        <td align="center" style="vertical-align: middle;">
                                                            <?= img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')); ?>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li><?= unserialize($p['product_name'])['thai']; ?></li>
                                                                <li>ราคา&nbsp;<?= $p['promotion_price'] ?>&nbsp;บาท</li>
                                                            </ul>
                                                        </td>
                                                        <?php
                                                    }
                                                }
                                                ?>                                
                                                <td align="center"  style="vertical-align: middle;" rowspan="<?= $num; ?>"> 
                                                    <?php
                                                    echo anchor('promotions/edit/' . $pro['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                                    if ($status == 0 && $diff > 0) {
                                                        echo anchor('#', '<i class="fa fa-refresh fa-lg"></i>&nbsp;ใช้งาน', $active);
                                                    } elseif ($status == 1 && $diff > 0) {
                                                        echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                                    } else {
                                                        echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                                    }
                                                    ?>
                                                </td>
                                            </tr>



                                            <?php
                                            if ($i != 0) {
                                                foreach ($products_had_promotion as $p) {
                                                    if ($p['promotion_id'] == $pro['id'] && $p['product_id'] != $product_id_frist) {
                                                        if ($status == '1' && $diff > 0) {
                                                            echo '<tr class="success">';
                                                        } elseif ($status == '0' && $diff > 0) {
                                                            echo '<tr class="warning">';
                                                        } else {
                                                            echo '<tr>';
                                                        }
                                                        ?>
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
                                        }
                                        ?>



                                        <?php
                                    }
                                    $i++;
                                }
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

