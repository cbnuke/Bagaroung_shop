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
    <div class="form-group <?= (form_error('subtitle[thai]')) ? 'has-error' : '' ?>">
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
    <div class="form-group <?= (form_error('link')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Link</label>
        <div class="col-sm-9">
            <?php echo $form['link_url']; ?>  
            <!--<input type="text" class="form-control" name='link' placeholder="Link">-->
        </div>
    </div>
    <div class="form-group <?= (form_error('img_slide')) ? 'has-error' : '' ?>" id="img_add">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-5">
            <?php echo $form['img_slide']; ?>  
            <!--<input type="file" class="form-control" name="img_slide" >-->
        </div>

    </div>
    <?php
    $image = FALSE;
    if ($form['image'] != NULL) {
        $image = TRUE;
        ?>
        <div class="form-group" id="img_show">
            <label class="col-sm-2 control-label">Image</label>
            <div class="col-xs-6 col-sm-2 placeholder">
                <div class="pull-right" id="btn_del_img" >                           
                    <input type="button" class="btn btn-outline btn-circle btn-danger btn-xs" value='-' id="del_img">                            
                </div>
                <?= $form['image'] ?>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-3">
            <?php echo $form['status_slide'] ?>  
<!--            <select class="form-control" name="status">
                <option value="1" >ใช้งาน</option>
                <option value="0">ไม่ใช้งาน</option>                        
            </select>-->
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


</form>   
</div>

<?= js('jquery.js'); ?>
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
            if (confirm('ลบรูปภาพ')) {
                $('#img_add').show();
                $('#img_show').hide(true);
            }

        });

    });
</script>  
