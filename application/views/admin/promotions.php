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
                <th style="width: 5%">สถานะ</th>
                <th style="width: 15%">รูปภาพ</th>
                <th style="width: 20%">ชื่อ</th>                                   
                <th style="width: 20%">รายละเอียด</th>
                <th style="width: 20%">สินค้า</th>                  
                <th style="width: 20%"></th>
            </tr>        
        </thead>
        <tbody>
            <tr>
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
                    <?= anchor('Products/edit', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                    <?= anchor('#', '<i class="fa fa-times fa-lg"></i>&nbsp;ยกเลิก', 'type="button" class="btn btn-danger btn-xs"') ?>
                </td>
            </tr>
            <tr>
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
                    <?= anchor('Products/edit', '<i class="fa fa-refresh fa-lg"></i>&nbsp;เริ่มใหม่', 'class="btn btn-info btn-xs"') ?>
                    <?= anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>      
                </td>
            </tr>

        </tbody>

    </table> 

</div>


