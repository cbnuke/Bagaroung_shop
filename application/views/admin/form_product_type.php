
<div class="row">
    <div class="page-header">
        <h1>
            <?= $title ?>
        </h1>
    </div>
</div>
<div class="row">
    <?php // echo validation_errors(); ?>
</div>
<div class="row">
    <div class="container">
        <?= $form['form'] ?>
        <div class="form-group <?= (form_error('type[thai]')) ? 'has-error' : '' ?>">
            <label class="col-sm-3 control-label">ชื่อประเภทสินค้า</label>
            <div class="col-sm-7">
                <?= $form['type[thai]']; ?>
            </div>       
        </div>

        <div class="form-group <?= (form_error('type[english]')) ? 'has-error' : '' ?>">
            <label class="col-sm-3 control-label">Product type</label>
            <div class="col-sm-7">
                <?= $form['type[english]']; ?>
            </div>      
        </div>   
        <hr>
        <div class="form-group ">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6" align="center">
                <input type="submit"  class="btn btn-success btn-lg" name="save" value="บันทึก" >
                <?= anchor('ProductTypes', 'ยกเลิก', 'class="btn btn-danger btn-lg"') ?>            
            </div>
        </div>

        <?= form_close(); ?>
    </div>
</div>

