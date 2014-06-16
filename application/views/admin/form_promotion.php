<script>
    function deleteRow(r)
    {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tb_products_promotion").deleteRow(i);
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
    $artribute = ' class="form-horizontal" role="form"';
    echo form_open_multipart('', $artribute);
    ?>

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
        <div class="col-sm-3">
            <?= $form['detail[english]']; ?>
            <!--<textarea class="form-control" rows="3" placeholder="Detail of Promotion" name="detali[english]" id="detali_en" ></textarea>-->
        </div>
    </div>
    <div class="form-group <?= (form_error('start')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">วันเริ่มต้น</label>
        <div class="col-sm-5">
            <div class='input-group date' id='datetimepicker_start'>
                <?= $form['start']; ?>
<!--                <input type='text' class="form-control" />-->
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group <?= (form_error('end')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">วันสิ้นสุด</label>
        <div class="col-sm-5">
            <div class='input-group date' id='datetimepicker_end'>
                <?= $form['end']; ?>
<!--                <input type='text' class="form-control" readonly="" />-->
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group <?= (form_error('img_promotion')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">รูปภาพ</label>
        <div class="col-sm-4">
            <?=$form['img_promotion']?>
            <!--<input type="file" name="" id="">-->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">สินค้าโปรโมชั่น</label>                
        <div class="col-sm-6">
            <div class="pull-left">
                <!-- Button trigger modal -->                    
                <input type="button" class="btn btn-outline btn-circle btn-success btn-sm" data-toggle="modal" data-target="#myModal" value="+" >
            </div>
            <br>
            <table id="tb_products_promotion" class="table table-responsive" >
                <thead>
                    <tr>
                        <th></th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>ราคาโปรโมชั่น</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this)"></td>
                        <td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                        <td>ชื่อกระเป๋าแบบที่ 1</td>
                        <td align="center">1000</td>
                        <td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>
                    </tr>
                    <tr>
                        <td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this)"></td>
                        <td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                        <td>ชื่อกระเป๋าแบบที่ 2</td>
                        <td align="center">1000</td>
                        <td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>
                    </tr>
                    <tr><td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this)"></td>
                        <td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                        <td>ชื่อกระเป๋าแบบที่ 3</td><td align="center">1000</td><td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>

    <div align="center">
        <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
        <?= anchor('Promotions', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>
    </div>
</form>

</div>

<div class="row">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">เลือกสินค้า</h4>
                </div>
                <div class="modal-body ">
                    <div class="row" > 
                        <div class="col-lg-3">  </div>
                        <div class="col-lg-6">
                            <div class="col-sm-12">
                                <select class="form-control">
                                    <option>ทั้งหมด</option>
                                    <option>Type 2</option>
                                    <option>Type 3</option>
                                    <option>Type 4</option>
                                    <option>Type 5</option>
                                </select>
                            </div>  
                        </div>
                        <div class="col-lg-3">  </div>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 5%"></th>
                                    <th style="width: 15%"></th>
                                    <th style="width: 25%">ชื่อ(TH)</th>                             
                                    <th style="width: 2%">ราคา(THB)</th>
                                    <th style="width: 5%">ประเภท</th>                    

                                </tr>        
                            </thead>
                            <tbody>                               
                                <tr>
                                    <td>
                                        <input type="checkbox" class="a" id="3" >                                             
                                    </td>
                                    <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                    <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                    <td>1390</td>
                                    <td>Bag Type</td>                               
                                </tr> 
                                <tr>
                                    <td>
                                        <input type="checkbox" class="a" id="4" >                                             
                                    </td>
                                    <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                    <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                    <td>1390</td>
                                    <td>Bag Type</td>                               
                                </tr> 
                                <tr>
                                    <td>
                                        <input type="checkbox" class="a" id="5">                                             
                                    </td>
                                    <td><img src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                    <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                    <td>1390</td>
                                    <td>Bag Type</td>                               
                                </tr> 
                                <tr>
                                    <td>
                                        <input type="checkbox" class="a" id="6" >                                             
                                    </td>
                                    <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                    <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                    <td>1390</td>
                                    <td>Bag Type</td>                               
                                </tr> 


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

<?= js('nicEdit-latest.js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#button").click(function() {
            var selected = $(".a:checked").map(function() {
                return this.id;
            }).toArray();
            //alert(selected.join(","));
            if (selected.length > 0) {
                var row = '';
                $.each(selected, function(index, value) {

                    $('#tb_products_promotion tbody > tr').remove();
                    //alert(index + ': ' + value);                     
                    row += '<tr>';
                    row += '<td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this)"></td>';
                    row += '<td align="center"><img src="http://localhost/Bagaroung_shop/assets/img/logo.png" style="width: 100px; height: 100px" class="img-responsive"></td>';
                    row += '<td>ชื่อกระเป๋าแบบที่ 2</td>';
                    row += '<td align="center">1000</td>';
                    row += '<td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>';
                    row += '</tr>';
                    console.log(index + ' == ' + value + '---' + row);
                });
                $('#tb_products_promotion').append(row);
            }
            $('#myModal').modal('hide');
        });
        //<![CDATA[
        bkLib.onDomLoaded(function() {
            new nicEditor({buttonList: ['fontSize', 'forecolor', 'bold', 'italic', 'center', 'left', 'right', 'underline', 'ol', 'ul', 'strikeThrough', 'subscript', 'superscript', 'html']}).panelInstance('detail[thai]');
            new nicEditor({buttonList: ['fontSize', 'forecolor', 'bold', 'italic', 'center', 'left', 'right', 'underline', 'ol', 'ul', 'strikeThrough', 'subscript', 'superscript', 'html']}).panelInstance('detail[english]');
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



    });

</script>

