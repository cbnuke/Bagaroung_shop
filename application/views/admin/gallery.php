<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo 'ห้อง' . $title; ?>
        </h1>
    </div>
</div>
<div class="row"> 
    <?= anchor('Gallery/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;เพิ่มรูปภาพ', 'type="button" class="btn btn-success pull-right btn-lg"') ?>
<!--    <a type="button" class="btn btn-success pull-right btn-lg" href="crate_slide.php" ><i class="fa fa-plus fa-lg"></i>&nbsp;Create Slide</a>   -->
</div>
<br>
<div class="row"> 
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li><a href="#all" data-toggle="tab">รูปภาพทั้งหมด</a></li>
            <li class="active"><a href="#active" data-toggle="tab">รูปภาพที่ใช้งาน</a></li>
            <li><a href="#non_active" data-toggle="tab">รูปภาพไม่ใช้งาน</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="all">
                <table class="table table-hover table-striped table-responsive">
                    <thead>
                    <th style="width: 5%;" ></th>
                    <th style="width: 20%;" >ชื่อหลัก</th>
                    <th style="width: 5%;" >ลิ้งค์</th>
                    <th style="width: 20%;" >รูปภาพ</th>
                    <th style="width: 30%" ></th>
                    </thead>
                    <tbody>
                        <?php
                        if ($gallery != NULL) {
                            $i = 1;
                            foreach ($gallery as $row) {
                                if ($row['status'] == '1') {
                                    echo '<tr class="success">';
                                    echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-check-square-o fa-lg"></i></td>';
                                } else {
                                    echo '<tr class="active">';
                                    echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-square-o fa-lg"></i></td>';
                                }
                                ?>  
                                                                                                                                                                                                                                                    <!--<td align="center"> <? $i ?></td>-->
                            <td>
                                <?= unserialize($row['title'])['thai']; ?>
                                <hr>
                                <?= unserialize($row['title'])['english']; ?>
                            </td>
                            <td align="center"  style="vertical-align: middle;"> <?= anchor($row['link_url'], '<i class="fa fa-link fa-2x"></i>', ''); ?></td>
                            <td align="center"  style="vertical-align: middle;"> <?= img($row['img_small'], array('class' => 'img-responsive thumbnail', 'width' => '100px', 'heght' => '100px')); ?></td>

                            <td align="center"  style="vertical-align: middle;"> 
                                <?php
                                $delete = array(
                                    'type' => "button",
                                    'class' => "btn btn-danger btn-xs",
                                    'data-id' => "2",
                                    'data-title' => "ลบ",
                                    'data-info' => unserialize($row['title'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'Gallery/delete/' . $row['id'],
                                );
                                $cancle = array(
                                    'type' => "button",
                                    'class' => "btn btn-warning btn-xs",
                                    'data-id' => "3",
                                    'data-title' => "ยกเลิกการ",
                                    'data-info' => unserialize($row['title'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'Gallery/cancle/' . $row['id'],
                                );
                                $active = array(
                                    'type' => "button",
                                    'class' => "btn btn-success btn-xs",
                                    'data-id' => "4",
                                    'data-title' => "",
                                    'data-info' => unserialize($row['title'])['thai'],
                                    'data-toggle' => "modal",
                                    'data-target' => "#confirm",
                                    'data-href' => 'Gallery/active/' . $row['id'],
                                );
                                echo anchor('Gallery/edit/' . $row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                if ($row['status'] == '1') {
                                    echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                } else {
                                    echo anchor('#', '<i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;ใช้งาน', $active) . '&nbsp;&nbsp';
                                    echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                }
                                ?>

                            </td>                
                            </tr>

                            <?php
                            $i++;
                        }
                    } else {
                        echo '<tr><td colspan="9" class="text-center">ไม่พบข้อมูลรูปภาพในระบบ</td></tr>';
                    }
                    ?>

                    </tbody>

                </table>
            </div>
            <div class="tab-pane active" id="active">
                <div class="container-fluid">
                    <div class="row" id="images">
                        <?php
                        if ($gallery != NULL) {
                            $i = 1;
                            foreach ($gallery as $row) {
                                if ($row['status'] == '1') {
                                    ?>

                                    <!--<div class="col-sm-4 col-md-4">-->
                                    <div class="thumbnail" id="itemp">
                                        <?= img($row['img_small'], array('class' => 'img-responsive', 'width' => '200px', 'heght' => '200px')); ?>
                                        <!--<img data-src="holder.js/200x200" class="thumbnail img-responsive" alt="..."  width="100%">-->
                                        <p class="pull-right"><i class="fa fa-link fa-2x"></i></p>
                                        <div class="caption">
                                            <h5>
                                                <p><?= unserialize($row['title'])['thai']; ?></p>
                                                <p class="text-muted"><?= unserialize($row['title'])['english']; ?></p>
                                            </h5>

                                            <div class="text-center center-block">
                                                <?php
                                                $cancle = array(
                                                    'type' => "button",
                                                    'class' => "btn btn-warning btn-xs",
                                                    'data-id' => "3",
                                                    'data-title' => "ยกเลิก",
                                                    'data-info' => unserialize($row['title'])['thai'],
                                                    'data-toggle' => "modal",
                                                    'data-target' => "#confirm",
                                                    'data-href' => 'Gallery/cancle/' . $row['id'],
                                                );
                                                $active = array(
                                                    'type' => "button",
                                                    'class' => "btn btn-success btn-xs",
                                                    'data-id' => "4",
                                                    'data-title' => "ใช้งาน",
                                                    'data-info' => unserialize($row['title'])['thai'],
                                                    'data-toggle' => "modal",
                                                    'data-target' => "#confirm",
                                                    'data-href' => 'Gallery/active/' . $row['id'],
                                                );
                                                echo anchor('Gallery/edit/' . $row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                                if ($row['status'] == '1') {
                                                    echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                                } else {
                                                    echo anchor('#', '<i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;ใช้งาน', $active) . '&nbsp;&nbsp';
                                                    echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                    <!--</div>-->

                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="row" hidden="">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <th style="width: 5%;" ></th>
                        <th style="width: 20%;" >ชื่อหลัก</th>
                        <th style="width: 5%;" >ลิ้งค์</th>
                        <th style="width: 20%;" >รูปภาพ</th>
                        <th style="width: 25%" ></th>

                        </thead>
                        <tbody>
                            <?php
                            if ($gallery != NULL) {
                                $i = 1;
                                foreach ($gallery as $row) {
                                    if ($row['status'] == '1') {
                                        if ($row['status'] == '1') {
                                            echo '<tr class="success">';
                                            echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-check-square-o fa-lg"></i></td>';
                                        } else {
                                            echo '<tr>';
                                            echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-square-o fa-lg"></i></td>';
                                        }
                                        ?>  
                                    <td style="vertical-align: middle;">
                                        <?= unserialize($row['title'])['thai']; ?>
                                        <hr>
                                        <?= unserialize($row['title'])['english']; ?>
                                    </td>
                                    <td align="center"  style="vertical-align: middle;"> <?= anchor($row['link_url'], '<i class="fa fa-link fa-2x"></i>', ''); ?></td>
                                    <td align="center"  style="vertical-align: middle;"> <?= img($row['img_small'], array('class' => 'img-responsive thumbnail', 'width' => '100px', 'heght' => '100px')); ?></td>

                                    <td align="center"  style="vertical-align: middle;"> 
                                        <?php
                                        $delete = array(
                                            'type' => "button",
                                            'class' => "btn btn-danger btn-xs",
                                            'data-id' => "2",
                                            'data-title' => "ลบ",
                                            'data-info' => unserialize($row['title'])['thai'],
                                            'data-toggle' => "modal",
                                            'data-target' => "#confirm",
                                            'data-href' => 'Gallery/delete/' . $row['id'],
                                        );
                                        $cancle = array(
                                            'type' => "button",
                                            'class' => "btn btn-warning btn-xs",
                                            'data-id' => "3",
                                            'data-title' => "ยกเลิก",
                                            'data-info' => unserialize($row['title'])['thai'],
                                            'data-toggle' => "modal",
                                            'data-target' => "#confirm",
                                            'data-href' => 'Gallery/cancle/' . $row['id'],
                                        );
                                        $active = array(
                                            'type' => "button",
                                            'class' => "btn btn-success btn-xs",
                                            'data-id' => "4",
                                            'data-title' => "ใช้งาน",
                                            'data-info' => unserialize($row['title'])['thai'],
                                            'data-toggle' => "modal",
                                            'data-target' => "#confirm",
                                            'data-href' => 'Gallery/active/' . $row['id'],
                                        );
                                        echo anchor('Gallery/edit/' . $row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                        if ($row['status'] == '1') {
                                            echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                        } else {
                                            echo anchor('#', '<i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;ใช้งาน', $active) . '&nbsp;&nbsp';
                                            echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                        }
                                        ?>

                                    </td>                


                                    </tr>

                                    <?php
                                    $i++;
                                }
                            }
                        } else {
                            echo '<tr><td colspan="9" class="text-center">ไม่พบข้อมูลรูปภาพในระบบ</td></tr>';
                        }
                        ?>

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="tab-pane" id="non_active">
                <table class="table table-hover table-responsive">
                    <thead>
                    <th style="width: 5%;" ></th>
                    <th style="width: 20%;" >ชื่อหลัก</th>
                    <th style="width: 5%;" >ลิ้งค์</th>
                    <th style="width: 20%;" >รูปภาพ</th>
                    <th style="width: 30%" ></th>

                    </thead>
                    <tbody>
                        <?php
                        if ($gallery != NULL) {
                            $i = 1;
                            foreach ($gallery as $row) {
                                if ($row['status'] == '0') {

                                    echo '<tr class="active">';
                                    echo '<td align="center"  style="vertical-align: middle;"><i class="fa fa-square-o fa-lg"></i></td>';
                                    ?>  
                                <td>
                                    <?= unserialize($row['title'])['thai']; ?>
                                    <hr>
                                    <?= unserialize($row['title'])['english']; ?>
                                </td>
                                <td align="center"  style="vertical-align: middle;"> <?= anchor($row['link_url'], '<i class="fa fa-link fa-2x"></i>', ''); ?></td>
                                <td align="center"  style="vertical-align: middle;"> <?= img($row['img_small'], array('class' => 'img-responsive thumbnail', 'width' => '100px', 'heght' => '100px')); ?></td>

                                <td align="center"  style="vertical-align: middle;"> 
                                    <?php
                                    $delete = array(
                                        'type' => "button",
                                        'class' => "btn btn-danger btn-xs",
                                        'data-id' => "2",
                                        'data-title' => "ลบ",
                                        'data-info' => unserialize($row['title'])['thai'],
                                        'data-toggle' => "modal",
                                        'data-target' => "#confirm",
                                        'data-href' => 'Gallery/delete/' . $row['id'],
                                    );
                                    $cancle = array(
                                        'type' => "button",
                                        'class' => "btn btn-warning btn-xs",
                                        'data-id' => "3",
                                        'data-title' => "ยกเลิก",
                                        'data-info' => unserialize($row['title'])['thai'],
                                        'data-toggle' => "modal",
                                        'data-target' => "#confirm",
                                        'data-href' => 'Gallery/cancle/' . $row['id'],
                                    );
                                    $active = array(
                                        'type' => "button",
                                        'class' => "btn btn-success btn-xs",
                                        'data-id' => "4",
                                        'data-title' => "ใช้งาน",
                                        'data-info' => unserialize($row['title'])['thai'],
                                        'data-toggle' => "modal",
                                        'data-target' => "#confirm",
                                        'data-href' => 'Gallery/active/' . $row['id'],
                                    );
                                    echo anchor('Gallery/edit/' . $row['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') . '&nbsp;&nbsp';
                                    if ($row['status'] == '1') {
                                        echo anchor('#', '<i class="fa fa-minus fa-lg"></i>&nbsp;ยกเลิก', $cancle);
                                    } else {
                                        echo anchor('#', '<i class="fa fa-refresh fa-lg fa-spin"></i>&nbsp;ใช้งาน', $active) . '&nbsp;&nbsp';
                                        echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', $delete);
                                    }
                                    ?>

                                </td>                
                                </tr>

                                <?php
                                $i++;
                            }
                        }
                    } else {
                        echo '<tr><td colspan="9" class="text-center">ไม่พบข้อมูลรูปภาพในระบบ</td></tr>';
                    }
                    ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

