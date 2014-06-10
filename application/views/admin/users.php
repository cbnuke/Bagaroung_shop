<div class="row">
    <div class="page-header">
        <h1>ผู้ใช้งาน</h1>
    </div>
</div>
<div class="row">    
    <?= anchor('Users/add', '<i class="fa fa-plus fa-lg"></i>&nbsp;เพิ่มผู้ใช้งาน', 'type="button" class="btn btn-success pull-right btn-lg"'); ?>
</div>
<br>
<div class="row">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th style="width: 25%" >ชื่อ</th>
                <th style="width: 25%" >Username</th>
                <th style="width: 10%" >Password</th>
                <th style="width: 10%">สิทธิ</th>
                <th style="width: 15%">เข้าใช้งานล่าสุด</th>
                <th style="width: 15%"></th>
            </tr>        
        </thead>
        <tbody>
            <tr>
                <td>ผู้ใช้งาน</td>
                <td>Username</td>
                <td>Password</td>
                <td>Admin</td>
                <td>10-05-14 19:00</td>
                <td aling="center" >
                    <?= anchor('Users/edit', '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-xs"') ?>
                    <?= anchor('#', '<i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ', 'type="button" class="btn btn-danger btn-xs"') ?>
                </td>
            </tr>

        </tbody>

    </table> 
</div>
