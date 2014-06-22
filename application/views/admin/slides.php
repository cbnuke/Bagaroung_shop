<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Slide</h1>
    </div>
</div>
<div class="row"> 
    <?= anchor('slides/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;สร้างสไลด์', 'type="button" class="btn btn-success pull-right btn-lg"') ?>
<!--    <a type="button" class="btn btn-success pull-right btn-lg" href="crate_slide.php" ><i class="fa fa-plus fa-lg"></i>&nbsp;Create Slide</a>   -->
</div>
<br>
<div class="row">
    <table class="table table-hover table-responsive">
        <thead>
        <th style="width: 5%; text-align:center" >ลำดับ</th>
        <th style="width: 25%; text-align:center" >ชื่อหลัก</th>
        <th style="width: 25%; text-align:center" >ชื่อรอง</th>
        <th style="width: 5%; text-align:center" >ลิ้งค์</th>
        <th style="width: 20%; text-align:center" >รูปภาพ</th>
        <!--<th style="width: 5%; text-align:center" >สถานะ</th>-->
        <th style="width: 15%" ></th>

        </thead>
        <tbody>
            <?php
            if ($slides != NULL) {
                $i = 1;
                foreach ($slides as $row) {
                    if ($row['status_slide'] == '1') {
                        echo '<tr class="success">';
                    } else {
                        echo '<tr>';
                    }
                    ?>                   
                <td align="center"> <?= $i ?></td>
                <td>
                    <?= $row['title']['thai']; ?>
                    <hr>
                    <?= $row['title']['english']; ?>
                </td>

                <td>
                    <?= $row['subtitle']['thai']; ?>
                    <hr>
                    <?= $row['subtitle']['english']; ?>
                </td>

                <td align="center"  style="vertical-align: middle;"> <?= anchor($row['link_url'], '<i class="fa fa-link fa-2x"></i>', ''); ?></td>
                <td align="center"  style="vertical-align: middle;"> <?= img($row['img_full'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')) ?></td>
                <?php
//                if ($row['status_slide'] == '1') {
//                    echo '<td><i class="fa fa-check-square-o fa-lg"></i>&nbsp;</td>';
//                } else {
//                    echo '<td><i class="fa fa-square-o fa-lg"></i>&nbsp;</td>';
//                }
                ?>    
                <td align="center"  style="vertical-align: middle;"> 
                    <?= anchor('Slides/edit/' . $row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                    <?= anchor('Slides/delete/' . $row['id'], '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', array('type' => "button", 'class' => "btn btn-danger btn-xs", 'onclick' => "javascript : return confirm('ลบสไลด์');")) ?>
                </td>                
                </tr>

                <?php
                $i++;
            }
        } else {
            echo '<tr><td colspan="9" class="text-center">ไม่พบข้อมูลสไลด์ในระบบ</td></tr>';
        }
        ?>

        </tbody>

    </table>

</div>
<!-- <tr>
                    <td>0</td>
                    <td>ทดสอบชื่อเรื่องหลัก</td>
                    <td>Title Test</td>
                    <td>ชื่อเรื่องรอง</td>
                    <td>Subtitle Test</td>
                    <td><a>Link 12345678910</a></td>
                    <td><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail" width="100" height="100"></td>
                    <td><i class="fa fa-check-square-o fa-lg"></i> <i class="fa fa-check-square-0 fa-lg"></i></td>
                    <td>
                        <? //anchor('Slides/edit/1', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                        <? //anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>
                    </td>                
                </tr>-->
