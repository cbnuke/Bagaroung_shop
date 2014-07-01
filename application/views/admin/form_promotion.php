<script>
    function deleteRow(r, id_check)
    {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tb_products_promotion").deleteRow(i);
        $('#' + id_check).prop('checked', false);
    }
</script>
<div class="row">
    <div class="page-header">
        <h1>
            <?= $title ?>
        </h1>
    </div>
</div>

<div class="row">
    <?php
    if ($id != null) {
        $promotion_id = $id;
    } else {
        $promotion_id = NULL;
    }
    echo $form['form'];
    ?>
    <div>
        <div class="form-group <?= (form_error('name[thai]')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">ชื่อ</label>
            <div class="col-sm-6">
                <?= $form['name[thai]']; ?>
                <!--<input type="text" class="form-control" name="" id="" placeholder="ชื่อโปรโมชั่น">-->
            </div>
        </div>
        <div class="form-group <?= (form_error('name[english]')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
                <?= $form['name[english]']; ?>
                <!--<input type="text" class="form-control" name="" id="" placeholder="Promotion name">-->
            </div>
        </div>
        <div class="form-group <?= (form_error('detail[thai]')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">รายละเอียด</label>
            <div class="col-sm-3">
                <?= $form['detail[thai]']; ?>
                <!--<textarea class="form-control" rows="3" placeholder="รายละเอียดโปรโมชั่น" name="detali[thai]" id="detali_th"></textarea>-->
            </div>
        </div>
        <div class="form-group <?= (form_error('detail[english]')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Detail</label>
            <div class="col-sm-3" >
                <?= $form['detail[english]']; ?>
                <!--<textarea class="form-control" rows="3" placeholder="Detail of Promotion" name="detali[english]" id="detali_en" ></textarea>-->
            </div>
        </div>
        <div class="form-group <?= (form_error('start')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">วันเริ่มต้น</label>
            <div class="col-sm-5">
                <div class='input-group date' id='datetimepicker_start' data-date-format="YYYY-MM-DD hh:mm:ss">
                    <?= $form['start']; ?>

<!--<input type='datetime' class="form-control" />-->
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group <?= (form_error('end')) ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">วันสิ้นสุด</label>
            <div class="col-sm-5">
                <div class='input-group date' id='datetimepicker_end' data-date-format="YYYY-MM-DD hh:mm:ss">
                    <?= $form['end']; ?>
    <!--                <input type='text' class="form-control" readonly="" />-->
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group <?= (form_error('img_promotion')) ? 'has-error' : '' ?>" id="img_add">
            <label class="col-sm-2 control-label">รูปภาพ</label>
            <div class="col-sm-4">
                <?= $form['img_promotion'] ?>
                <!--<input type="file" name="" id="">-->
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
                        <a></a>
                        <button type="button" class="btn btn-outline btn-circle btn-danger btn-sm" id="del_img" ><i class="fa fa-times fa-lg" ></i></button>                      
                    </div>
                    <?= $form['image'] ?>
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">สินค้าโปรโมชั่น</label>                
            <div class="col-sm-6">
                <div class="pull-left">                    
                    <button type="button" class="btn btn-outline btn-circle btn-success btn-sm" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus fa-lg"></i> </button>
                </div>
                <br>
                <table id="tb_products_promotion" class="table table-responsive" >
                    <thead>
                        <tr>
                            <th style="width: 10%"></th>
                            <th style="width: 20%">รูปภาพ</th>
                            <th style="width: 30%">ชื่อ</th>
                            <th style="width: 15%">ราคา</th>
                            <th style="width: 25%">ราคาโปรโมชั่น</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $form['products_select']; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div align="center">
            <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
            <?= anchor('Promotions', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>
        </div>
    </div>
    <div id="form_modal">
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">เลือกสินค้า</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="row" style="padding-bottom: 10px">   
                            <div class="col-sm-12"> 
                                <div class="col-sm-6 col-sm-offset-3">                                
                                    <?= $form['product_type_id']; ?>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-condensed table-responsive" id="tb_products">
                                <thead>
                                    <tr>
                                        <th style="width: 10%"></th>
                                        <th style="width: 20%"></th>
                                        <th style="width: 25%">ชื่อ</th>                             
                                        <th style="width: 20%">ราคา</th>  
                                    </tr>        
                                </thead>
                                <tbody >    
                                    <?= $form['products'] ?>

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
    </div>


    <?= form_close(); ?>

</div>

<?= js('nicEdit-latest.js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#button").click(function() {
            var selected = $(".a:checked").map(function() {
                return this.id;
            }).toArray();
            if (selected.length > 0) {
                $('#tb_products_promotion tbody > tr').remove();

                $.each(selected, function(index, value) {
                    $.ajax({
                        type: "POST",
                        //set the data type
                        data: "id_product=" + value,
                        dataType: 'json',
                        url: '<?= base_url(); ?>' + 'promotions/get_product_select', // target element(s) to be updated with server response 
                        cache: false,
                        //check this in firefox browser
                        success: function(response) {
                            //console.log(response);
                            //alert(response);                                                        
                            var row = '';
                            row += '<tr>';
                            row += '<td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this,' + response.id + ')"></td>';
                            row += '<td align="center">' + response.img_front + '</td>';
                            row += '<td>' + response.product_name + '</td>';
                            row += '<td>' + response.price + '</td>';
                            var pro_price = '';
                            if (response.promotion_price != null)
                            {
                                pro_price = response.promotion_price;
                            }
                            row += '<td><input type="text" name="promotion_price[]" required="" value="' + pro_price + '"><span>&nbsp;บาท</span></td>';
                            row += '</tr>';
                            //                            console.log(row + '<----->');
                            $('#tb_products_promotion tbody').append(row);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            }
            $('#myModal').modal('hide');
            return false;
        });

        $("#product_type").change(function() {
            var type_id = $(this).val();
            var promotion_id = '<?= $promotion_id ?>';
            //            alert(promotion_id);
            //            alert($(this).val());            
            $.ajax({
                type: "POST",
                //set the data type
                data: "type_id=" + type_id + "&promotion_id=" + promotion_id,
                dataType: 'json',
                url: '<?= base_url(); ?>' + 'promotions/check_products_by_type', // target element(s) to be updated with server response 
                cache: false,
                //check this in firefox browser
                success: function(response) {
                    //                    console.log(response);
                    $('#tb_products tbody > tr').remove();
                    $('#tb_products tbody').append(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });

        //<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor({buttonList: ['fontSize', 'forecolor', 'bold', 'italic', 'left', 'center', 'right', 'underline', 'ol', 'ul', 'strikeThrough', 'subscript', 'superscript', 'html']}).panelInstance('detail[thai]');
            new nicEditor({buttonList: ['fontSize', 'forecolor', 'bold', 'italic', 'left', 'center', 'right', 'underline', 'ol', 'ul', 'strikeThrough', 'subscript', 'superscript', 'html']}).panelInstance('detail[english]');

        });

        //]]>
        //date start and end
        $('#datetimepicker_start').datetimepicker();
        $('#datetimepicker_end').datetimepicker();
        $("#datetimepicker_start").on("dp.change", function(e) {
            $('#datetimepicker_end').data("DateTimePicker").setMinDate(e.date);
        });
        $("#datetimepicker_end").on("dp.change", function(e) {
            $('#datetimepicker_start').data("DateTimePicker").setMaxDate(e.date);
        });
        //edit
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

