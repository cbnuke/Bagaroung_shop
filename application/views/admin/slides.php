<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Slide</h1>
    </div>
</div>
<div class="row"> 
     <?= anchor('slides/add','<i class="fa fa-plus fa-lg"></i>&nbsp;สร้างสไลด์','type="button" class="btn btn-success pull-right"')?>
<!--    <a type="button" class="btn btn-success pull-right" href="crate_slide.php" ><i class="fa fa-plus fa-lg"></i>&nbsp;Create Slide</a>   -->
</div>
<div class="row">
    <table class="table table-responsive">
        <thead>
        <th>ลำดับ</th>
        <th>ชื่อหลัก(TH)</th>
        <th>ชื่อหลัก(EN)</th>
        <th>ชื่อรอง(TH)</th>
         <th>ชื่อรอง(EN)</th>
        <th>ลิ้งค์</th>
        <th>รูปภาพ</th>
        <th>สถานะ</th>
        <th></th>
        
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td>ทดสอบชื่อเรื่องหลัก</td>
                <td>Title Test</td>
                <td>ชื่อเรื่องรอง</td>
                <td>Subtitle Test</td>
                <td><a>Link 12345678910</a></td>
                <td><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                <td><i class="fa fa-check-square-o fa-lg"></i> <i class="fa fa-check-square-0 fa-lg"></i></td>
                <td>
                    <?= anchor('Slides/edit','<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข','type="button" class="btn btn-info btn-xs"')?>
                    <?= anchor('#','<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ','type="button" class="btn btn-danger btn-xs"')?>
<!--                    <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil fa-lg"></i> Edit</button>-->
<!--                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Delete</button>-->
                </td>
                
            </tr>
        </tbody>
            
    </table>

</div>
