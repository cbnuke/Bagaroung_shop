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
            <tr>
                <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>
                <td>Bag---Bag---Bag---Bag---Bag</td>
                <td>158</td>
                <td>30</td>
                <td>52.5</td>                
                <td>1390</td>
                <td>Bag Type</td>
                <td><?= anchor('Products/view/122','ดู') ?></td>
                <td>
                    <?= anchor('Products/edit', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                    <?= anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>
                </td>
            </tr>

        </tbody>

    </table> 
</div>

