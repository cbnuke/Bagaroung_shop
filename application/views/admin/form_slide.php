<div class="row">
    <div class="col-lg-12">
        <h1><?= $title ?></h1>
    </div>
</div>
<hr>
<div class="row">
    <?= form_open() ?>

    <?= form_close() ?>
</div>

<div class="row">
    <?php echo $form['form']; ?>
    <div class="form-group <?= (form_error('title[thai]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">ชื่อเรื่อง</label>
        <div class="col-sm-8">
            <?php echo $form['title[thai]']; ?>   
            <!--<input type="text" class="form-control" name="title[english]" placeholder="Tltle">-->
        </div>
    </div> 
    <div class="form-group <?= (form_error('title[english]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-8">
            <?php echo $form['title[english]']; ?>     
            <!--<input type="text" class="form-control" name="title[english]" placeholder="Tltle">-->
        </div>
    </div>
    <div class="form-group <?= (form_error('subtitle[thai]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">ชื่อเรื่องรอง</label>
        <div class="col-sm-8">
            <?php echo $form['subtitle[thai]']; ?>   
            <!--<input type="text" class="form-control" name="title[english]" placeholder="Tltle">-->
        </div>
    </div>              
    <div class="form-group <?= (form_error('subtitle[english]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Sub Title</label>
        <div class="col-sm-8">
            <?php echo $form['subtitle[english]']; ?>     
            <!--<input type="text" class="form-control" name="subtitle[english]" placeholder="Sub Tltle">-->
        </div>
    </div>
    <div class="form-group <?= (form_error('link_url')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Link</label>
        <div class="col-sm-9">
            <?php echo $form['link_url']; ?>  
            <!--<input type="text" class="form-control" name='link' placeholder="Link">-->
        </div>
    </div>
    <div class="form-group <?= (form_error('img_slide')) ? 'has-error' : '' ?>" id="img_add">
        <label class="col-sm-2 control-label">รูปภาพ</label>
        <div class="col-sm-4">
            <?php echo $form['img_slide']; ?>  
            <p style="color:red;margin-top: 10px;">ขนาด&nbsp;<span class="label label-danger"><strong>900px*500px</strong></span>&nbsp;หรือมากกว่า</p>  
        </div>

    </div>
    <?php
    $image = FALSE;
    if ($form['image'] != NULL) {
        $image = TRUE;
        ?>
        <div class="form-group" id="img_show">
            <label class="col-sm-2 control-label">รูปภาพ</label>
            <div class="col-xs-6 col-sm-2 placeholder">
                <div class="pull-right" id="btn_del_img" >                     
                    <button type="button" class="btn btn-outline btn-circle btn-danger btn-xs" id="del_img" ><i class="fa fa-times fa-lg" ></i></button>                             
                </div>
                <?= $form['image'] ?>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <label class="col-sm-2 control-label">สถานะ</label>
        <div class="col-sm-3">
            <?php echo $form['status_slide'] ?>  
        </div>
    </div>
    <hr>
    <div class="form-group" align="center">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <input type="submit" class="btn btn-success btn-lg" name="save" value="บันทึก" >
            <?= anchor('Slides', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>   
        </div>
    </div>


</form>   
</div>

<script>
    $(document).ready(function() {
        var img = '<?= $image ?>';
//        alert(img);
        if (img == true)
        {
            $('#img_add').hide();
        }
        $("#del_img").click(function() {
//            alert("delete");

            $('#img_add').show();
            $('#img_show').hide(true);


        });

    });
</script>  
