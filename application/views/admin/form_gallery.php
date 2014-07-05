<div class="row">
    <div class="col-lg-12">
        <h1><?= $title; ?></h1>
    </div>
</div>
<hr>

<div class="row">
    <?php echo $form['form']; ?>
    <div class="form-group <?= (form_error('title[thai]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">ชื่อรูป</label>
        <div class="col-sm-5">
            <?php echo $form['title[thai]']; ?>   
            <!--<input type="text" class="form-control" name="title[english]" placeholder="Tltle">-->
        </div>
    </div> 
    <div class="form-group <?= (form_error('title[english]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-5">
            <?php echo $form['title[english]']; ?>     
            <!--<input type="text" class="form-control" name="title[english]" placeholder="Tltle">-->
        </div>
    </div>
    <div class="form-group <?= (form_error('link_url')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Link</label>
        <div class="col-sm-4">
            <?php echo $form['link_url']; ?>  
            <!--<input type="text" class="form-control" name='link' placeholder="Link">-->
        </div>
        <a data-toggle="modal" href="#modal_products" class="btn btn-default"><i class="fa fa-search fa-lg"> ค้นหาสินค้า</i></a>
    </div>
    <div class="form-group <?= (form_error('img_upload')) ? 'has-error' : '' ?>" id="img_add">
        <label class="col-sm-2 control-label">รูปภาพ</label>
        <div class="col-sm-4">
            <?php echo $form['img_upload']; ?>
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
            <?php echo $form['status'] ?>  
        </div>
    </div>
    <hr>
    <div class="form-group" align="center">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <input type="submit" class="btn btn-success btn-lg" name="save" value="บันทึก" >
            <?= anchor('Gallery', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>   
        </div>
    </div>


</form>   
</div>

<div class="modal fade" id="modal_products" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">เลือกสินค้า</h4>
            </div>
            <div class="modal-body"  style="height: 75%;overflow: auto">
                <div class="row"style="padding-bottom: 10px;">   
                    <div class="col-sm-12"> 
                        <div class="col-sm-6 col-sm-offset-3">                                
                            <?php echo $form['product_type_id']; ?>                                   
                        </div>  
                    </div>
                </div>
                <div class="row">                    
                    <table class="table table-condensed table-hover table-responsive" id="tb_products">
                        <thead>
                            <tr>
                                <th style="width: 10%"></th>
                                <th style="width: 20%"></th>
                                <th style="width: 25%">ชื่อ</th>                             
                                <th style="width: 20%">ราคา</th>  
                            </tr>        
                        </thead>
                        <tbody >    
                            <?php echo $form['products'] ?>

                        </tbody>
                    </table> 

                </div>

            </div>
            <div class="modal-footer">                    
                <input type="button" class="btn btn-primary" id="button" value='ตกลง'>
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
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
        $("#product_type").change(function() {
            var type_id = $(this).val();

            $.ajax({
                type: "POST",
                //set the data type
                data: "type_id=" + type_id,
                dataType: 'json',
                url: '<?= base_url(); ?>' + 'Gallery/check_products_by_type', // target element(s) to be updated with server response 
                cache: false,
                //check this in firefox browser
                success: function(response) {
                    console.log(response);
                    $('#tb_products tbody > tr').remove();
                    $('#tb_products tbody').append(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $("#button").click(function() {
            var product_id = document.getElementsByName('products_id');
            var selected;
            for (var i = 0; i < product_id.length; i++) {
                if (product_id[i].checked) {
                    selected = product_id[i].value;
                }
            }
            var link = '<?php echo base_url('DetailProduct/id'); ?>' + '/' + selected;
            $('#link_url').val(link);
            $('#modal_products').modal('hide');
        });
        $("tr").click(function() {
//            alert("Click!");
            $(this).find('td input:radio').prop('checked', true);
        });
    });

</script>  
