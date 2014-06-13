
<div class="row">
    <div class="page-header">
        <h1>
            <?= $title ?>
        </h1>
    </div>
</div>
<div class="row">

    <?php
    $name_th = '';
    $name_en = '';
    $attributes = array('class' => 'form-horizontal', 'id' => 'form_product_type');
    if ($mode == 'edit') {
        echo form_open('', $attributes);
        foreach ($type as $r) {
            $name_th = $r['product_type']['thai'];
            $name_en = $r['product_type']['english'];
        }
    } else {
        echo form_open('ProductTypes/add', $attributes);
    }
    ?>   
    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(TH)</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="type[thai]" id="" placeholder="ชื่อประเภทสินค้า" required="" value="<?= $name_th ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(EN)</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="type[english]" id="" placeholder="Product Type Name" required="" value="<?= $name_en ?>">
        </div>
    </div>   
    <hr>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6" align="center">
            <input type="submit"  class="btn btn-success btn-lg" name="save" value="บันทึก" >
<?= anchor('ProductTypes', 'ยกเลิก', 'class="btn btn-danger btn-lg"') ?>            
        </div>
    </div>

<?= form_close(); ?>

</div>

