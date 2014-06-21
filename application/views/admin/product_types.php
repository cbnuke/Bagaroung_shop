
<div class="row">
    <div class="page-header">
        <h1><?= $title ?></h1>
    </div>
</div>

<div class="row">    
    <?= anchor('ProductTypes/add ', '<i class="fa fa-plus fa-lg"></i>&nbsp;เพิ่มประเภทสินค้า', 'type="button" class="btn btn-success pull-right btn-lg"'); ?>
</div>
<br>
<div class="row">

    <table class="table table-responsive">
        <thead>
            <tr>
                <th style="width: 35%" >ชื่อ</th>
                <th style="width: 35%" >Name</th>
                <th style="width: 10%">จำนวนสินค้า</th>
                <th style="width: 10%"></th>
            </tr>        
        </thead>
        <tbody>
<!--            <tr>
                <td>ประเภทกระเป๋า</td>
                <td>Bag Type</td>
                <td>10</td>
                <td>
            <?= anchor('ProductTypes/edit/1', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
            <?= anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>

                </td>
            </tr>-->
            <?php
            if (count($type) > 0) {
                foreach ($type as $r) {
                    echo '<tr>';
                    echo '<td>' . $r['product_type']['thai'] . '</td>';
                    echo '<td>' . $r['product_type']['english'] . '</td>';
                    echo '<td>' . $r['number'] . '</td>';
                    echo '<td>';
                    echo anchor('ProductTypes/edit/' . $r['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"');
                    echo '&nbsp;';
                    echo anchor('ProductTypes/delete/' . $r['id'], '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"');
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?> 
        </tbody>

    </table> 
</div>




