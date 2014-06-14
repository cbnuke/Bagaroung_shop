
<div class="row">
    <div class="col-lg-12">
        <h1><?= $title ?></h1>
    </div>
</div>
<hr>
<div class="row">
    <div class="container">
        <?php
        $name_th = '';
        $name_en = '';
        $attributes = array('class' => 'form-horizontal', 'id' => 'form_slide');
        if ($mode == 'edit') {
            echo form_open('', $attributes);
//            foreach ($type as $r) {
//                foreach ($r as $i) {
//                    $name_th = $i['thai'];
//                    $name_en = $i['english'];
//                }
//            }
        } else {
            echo form_open('slides/add', $attributes);
        }
        ?> 
        <div class="form-group" id="error">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4">
                <div class="alert alert-danger">
                    <?= validation_errors(); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อเรื่อง</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="title[thai]" placeholder="ชื่อเรื่อง">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อเรื่องรอง</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subtitle[thai]" placeholder="ชื่อเรื่องรอง">
            </div>
        </div>               

        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="title[english]" placeholder="Tltle">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sub Title</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subtitle[english]" placeholder="Sub Tltle">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Link</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name='link' placeholder="Link">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control"  id="" name="img"  >
            </div>
        </div>
        <div class="form-group" id="image">
            <label class="col-sm-2 control-label"></label>
            <div class="col-xs-6 col-sm-2 placeholder">
                <div class="pull-right" id="btn_del_img" >                           
                    <input type="button" class="btn btn-outline btn-circle btn-danger btn-xs" value='-'>                            
                </div>
                <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-3">
                <select class="form-control col-sm-3" name="status">
                    <option value="1" >ใช้งาน</option>
                    <option value="0">ไม่ใช้งาน</option>                        
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
                <input type="submit" class="btn btn-success btn-lg" name="save" value="บันทึก" >
                <?= anchor('slides', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>   
            </div>
        </div>
        <div>

        </div>

        </form>
    </div>   
</div>

<?= js('jquery.js'); ?>
<script>
    $(document).ready(function() {
        var mode = '<?= $mode ?>';
//        alert(mode);
        if (mode == 'edit')
        {
            $('#image').show();
        } else
        {
            $('#image').hide();
        }
        var error = '<?= validation_errors() ?>';

        if (error == '')
        {
            $('#error').hide(true);
        } else
        {
            $('#error').show();
        }
    });
</script>  
