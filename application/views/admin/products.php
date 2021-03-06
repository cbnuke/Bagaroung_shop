<div class="row">
    <div class="page-header">
        <h1>
            <?= 'รายการ' . $title ?>
        </h1>
    </div>
</div>

<div class="row">    
    <?= anchor('Products/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;Add Product', 'type="button" class="btn btn-success btn-lg pull-right"'); ?>
</div>
<div class="row">

    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form method="post" action="" name="myform" >
            <?= $product_types ?>
        </form>
    </div>
    <div class="col-sm-4"></div>

</div>
<br>
<div class="row">
    <table class="table table-condensed table-hover table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 15%"></th>
                <th style="width: 20%">ชื่อ</th>
<!--                <th style="width: 25%">ชื่อ(EN)</th>-->
                <th style="width: 15%">ราคา(บาท)</th>
<!--                <th style="width: 2%">กว้าง(cm)</th>
                <th style="width: 2%">สูง(cm)</th>
                <th style="width: 2%">ฐานกว้าง(cm)</th>
                <th style="width: 2%">ช่วงบนกว้าง(cm)</th>
                <th style="width: 2%">หนัก(kg)</th>   -->

                <th style="width: 10%">รายละเอียด</th>
                <th style="width: 20%"></th>
            </tr>        
        </thead>
        <tbody>
            <?php
            if ($list_products != NULL)
                foreach ($list_products as $row) {
                    if ($row['product_status'] == 1) {
                        echo '<tr class="success">';
                    } else {
                        echo '<tr class="active">';
                    }
                    ?>

                <td align="center"  style="vertical-align: middle;" ><?= img('products/thumbs/' . $row['img_front'], array('class' => 'img-responsive ', 'width' => '100', 'height' => '100')) ?></td>
                <td>
                    <?= unserialize($row['product_name'])['thai'] ?>
                    <hr>
                    <?= unserialize($row['product_name'])['english'] ?>
                </td>
                <td class="td-text-center"><?= number_format($row['product_price'], 2) ?></td> 

                <?php
                $delete = array(
                    'type' => "button",
                    'class' => "btn btn-danger btn-sm",
                    'data-id' => "2",
                    'data-title' => "ลบ",
                    'data-info' => unserialize($row['product_name'])['thai'],
                    'data-toggle' => "modal",
                    'data-target' => "#confirm",
                    'data-href' => 'Products/delete/' . $row['id'],
                );
                $cancle = array(
                    'type' => "button",
                    'class' => "btn btn-warning btn-sm",
                    'data-id' => "3",
                    'data-title' => "ยกเลิกขาย",
                    'data-info' => unserialize($row['product_name'])['thai'],
                    'data-toggle' => "modal",
                    'data-target' => "#confirm",
                    'data-href' => 'Products/cancle/' . $row['id'],
                );
                $active = array(
                    'type' => "button",
                    'class' => "btn btn-success btn-sm",
                    'data-id' => "4",
                    'data-title' => "ขาย",
                    'data-info' => unserialize($row['product_name'])['thai'],
                    'data-toggle' => "modal",
                    'data-target' => "#confirm",
                    'data-href' => 'Products/active/' . $row['id'],
                );
                ?>
                <td class="td-text-center"><?= anchor('Products/view/' . $row['id'], '<i class="fa fa-file-o fa-3x"></i>') ?></td>
                <td class="td-text-center">
                    <?= anchor('Products/edit/' . $row['id'], '<i class="fa fa-pencil fa-2x"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-sm"') . '&nbsp'; ?>
                    <?php
                    if ($row['product_status'] == '1') {
                        echo anchor('#', '<i class="fa fa-power-off fa-2x"></i>&nbsp;ยกเลิก', $cancle);
                    } else {
                        echo anchor('#', '<i class="fa fa-refresh fa-2x fa-spin"></i>&nbsp;ใช้งาน', $active) . '&nbsp;&nbsp';
                        echo anchor('#', '<i class="fa fa-trash-o fa-2x"></i>&nbsp;ลบ', $delete);
                    }
                    ?>                   
                </td>
                </tr>

                <?php
                //End foreach
            } else {
            echo '<tr><td colspan="10" class="text-center">ไม่พบข้อมูลสินค้าในระบบ</td></tr>';
        }
        ?>
        </tbody>

    </table> 
</div>

