<div class="row">
    <div class="page-header">
        <h1><?= $title ?></h1>
    </div>
</div>
<div class="row">    
    <?= anchor('Users/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;เพิ่มผู้ใช้งาน', 'type="button" class="btn btn-success pull-right btn-lg"'); ?>
</div>
<br>
<div class="row">
    <table class="table table-condensed table-hover table-responsive">
        <thead>
            <tr>
                <th style="width: 25%;text-align:center ;vertical-align: middle" >ชื่อ</th>
                <th style="width: 25%;text-align:center ;vertical-align: middle" >Username</th>
<!--                <th style="width: 10%" >Password</th>-->
                <th style="width: 10%;text-align:center ;vertical-align: middle">สิทธิ</th>
                <th style="width: 15%;text-align:center ;vertical-align: middle">เข้าใช้งานล่าสุด</th>
                <th style="width: 15%"></th>
            </tr>        
        </thead>
        <tbody>
            <?php
            if (count($users) > 0) {
                foreach ($users as $r) {
                    $id=$r['id'];
                    $name = $r['firstname'] . '  ' . $r['lastname'];
                    $username = $r['username'];
//                    $password = $r['password'];
                    $type = $r['user_type'];
                    $row = "<tr>";
                    $row .= "<td>$name</td>";
                    $row .= "<td>$username</td>";
//                    $row .= "<td>$password</td>";
                    $row .= '<td align="center"  style="vertical-align: middle;">'.$type.'</td>';
                    $row .= '<td align="center"  style="vertical-align: middle;"> 10-05-14 19:00</td>';
                    $row .= '<td align="center"  style="vertical-align: middle;">';
                    $row.=anchor("Users/edit/$id", '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"').'&nbsp;';
                    $row.=anchor("Users/delete/$id", '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"');

                    $row .= "</td>";
                    $row .= "</tr>";

                    echo $row;
                }
            }
            ?>

        </tbody>

    </table> 
</div>
