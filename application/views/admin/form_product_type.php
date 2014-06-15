
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
        $name_th = $type['product_type']['thai'];
        $name_en = $type['product_type']['english'];
    } else {
        echo form_open('ProductTypes/add', $attributes);
        $name_th = set_value('type[thai]');
        $name_en = set_value('type[english]');
    }
    ?>     
    <div class="form-group" id="error">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
            <div class="alert alert-danger">
                <?php
                    $e = validation_errors();
                    if ($e != '') {
                        $error = 'FALSE';
                    } else {
                        $error = 'TRUE';
                    }
                    echo $e;
                    ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(TH)</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='type[thai]' id="" placeholder="ชื่อประเภทสินค้า" value="<?= $name_th ?>">
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('type[thai]', '<font color="error">', '</font>'); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(EN)</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="type[english]" id="" placeholder="Product Type Name"  value="<?= $name_en ?>">
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('type[english]', '<font color="error">', '</font>'); ?>
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
<?= js('jquery.js'); ?>
<script>
    $(document).ready(function() {
     var error = '<?= $error ?>';

        if (error == 'TRUE') {
            $('#error').hide(true);
        } else
        {
            $('#error').show();
        }
    });
</script>  
