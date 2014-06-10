
<div class="row">
    <div class="page-header">
        <h1>
            <?= $page_title ?>
        </h1>
    </div>
</div>
<div class="row" >    
    <form class="form-horizontal" role='form' align="center">
        <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อ</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="" id="" placeholder="ชื่อ">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">นามสกุล</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="" id="" placeholder="นามสกุล">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="" id="" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="" id="" placeholder="Password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Confrim Password</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="" id="" placeholder="Confrim Password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">ประเภทผู้ใช้งาน</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>User</option>
                    <option>Admin</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group" >
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4" align="center">
                <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
                <?= anchor('Users', 'ยกเลิก', 'class="btn btn-danger btn-lg"') ?> 
            </div>
        </div>
    </form>

</div>

