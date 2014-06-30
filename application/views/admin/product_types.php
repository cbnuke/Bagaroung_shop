
<div class="row">
    <div class="page-header">
        <h1><?= $title ?></h1>
    </div>
</div>

<div class="row col-sm-10 col-md-offset-1">    
    <?= anchor('ProductTypes/add ', '<i class="fa fa-plus fa-lg"></i>&nbsp;เพิ่มประเภทสินค้า', 'type="button" class="btn btn-success pull-right btn-lg"'); ?>
</div>
<br>
<div class="row">
    <div class="col-sm-10 col-md-offset-1 table-responsive">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 35%" >ชื่อ</th>
                    <!--<th style="width: 35%" >Name</th>-->
                    <th style="width: 10%">จำนวนสินค้า</th>
                    <th style="width: 20%"></th>
                </tr>        
            </thead>
            <tbody>

                <?php
                $i=0;
                if (count($type) > 0 && $type != NULL) {
                    foreach ($type as $r) {


                        $delete = array(
                            'type' => "button",
                            'class' => "btn btn-danger btn-xs",
                            'data-id' => "2",
                            'data-title' => "ลบ",
                            'data-info' => $r['product_type']['thai'],
                            'data-toggle' => "modal",
                            'data-target' => "#confirm",
                            'data-href' => 'ProductTypes/delete/' . $r['id'],
                        );
                        $cancle = array(
                            'type' => "button",
                            'class' => "btn btn-warning btn-xs",
                            'data-id' => "3",
                            'data-title' => "ยกเลิก",
                            'data-info' => $r['product_type']['thai'],
                            'data-toggle' => "modal",
                            'data-target' => "#confirm",
                            'data-href' => 'ProductTypes/cancle/' . $r['id'],
                        );
                        $active = array(
                            'type' => "button",
                            'class' => "btn btn-success btn-xs",
                            'data-id' => "4",
                            'data-title' => "ใช้งาน",
                            'data-info' => $r['product_type']['thai'],
                            'data-toggle' => "modal",
                            'data-target' => "#confirm",
                            'data-href' => 'ProductTypes/active/' . $r['id'],
                        );

                        echo '<tr>';
                        echo '<td class="text-center" >'.++$i.'</td>'; 
                        echo '<td>';
                        echo $r['product_type']['thai'];
                        echo '<br>';
                        echo $r['product_type']['english'];
                        echo '</td>';
                        echo '<td class="text-center">' . $r['number'] . '</td>';
                        echo ' <td align="center"  style="vertical-align: middle;"> ';
                        echo anchor('ProductTypes/edit/' . $r['id'], '<i class="fa fa-pencil fa-fw fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"');
                        echo '&nbsp;';
                        echo anchor('#', '<i class="fa fa-trash-o fa-fw fa-lg"></i>&nbsp;ลบ', $delete);
                        echo '</td>';
                        echo '</tr>';
                        
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center">ไม่พบประเภทสินค้าในระบบ</td></tr>';
                }
                ?> 
            </tbody>

        </table> 
    </div>
</div>




