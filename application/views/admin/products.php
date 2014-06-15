<div class="row">
    <div class="page-header">
        <h1>
            <?= $page_title ?>
        </h1>
    </div>
</div>

<div class="row">    
    <?= anchor('Products/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;Add Product', 'type="button" class="btn btn-success btn-lg pull-right"'); ?>
</div>
<hr>
<div class="row">
    <table class="table-condensed table-responsive">
        <thead>
            <tr>
                <th style="width: 15%"></th>
                <th style="width: 25%">ชื่อ(TH)</th>
                <th style="width: 25%">ชื่อ(EN)</th>
                <th style="width: 2%">กว้าง(cm)</th>
                <th style="width: 2%">สูง(cm)</th>
                <th style="width: 2%">หนัก(kg)</th>                
                <th style="width: 2%">ราคา(THB)</th>
                <th style="width: 5%">ประเภท</th>                    
                <th style="width: 8%">รายละเอียด</th>
                <th style="width: 15%"></th>
            </tr>        
        </thead>
        <tbody>
            <?php
            if ($list_products != NULL)
                foreach ($list_products as $row) {
                    ?>

                <td><?= img($row['img_front'], array('class' => 'img-responsive thumbnail')) ?></td>
                <td><?= unserialize($row['product_name'])['thai'] ?></td>
                <td><?= unserialize($row['product_name'])['english'] ?></td>
                <td><?= $row['width']?></td>
                <td><?= $row['hight']?></td>
                <td><?= $row['weight']?></td>                
                <td><?= $row['product_price']?></td>
                <td><?= unserialize($row['product_type'])['thai'] ?></td>
                <td><?= anchor('Products/view/122', 'ดู') ?></td>
                <td>
                    <?= anchor('products/edit/'.$row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                    <?= anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>
                </td>

                <?php
                //End foreach
            } else {
            echo '<tr><td colspan="10" class="text-center">ไม่พบข้อมูลสินค้าในระบบ</td></tr>';
        }
        ?>
        </tbody>

    </table> 
</div>

