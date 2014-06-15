<script language="javascript">
    function fncCreateElement() {

        var mySpan = document.getElementById('mySpan');

        var myLine = document.getElementById('hdnLine');
        myLine.value++;


        // Create input file
        var myElement = document.createElement('input');
        myElement.setAttribute('type', "file");
        myElement.setAttribute('name', "fileUpload" + myLine.value);
        myElement.setAttribute('id', "file" + myLine.value);
        myElement.setAttribute('class', "form-control");
        myElement.setAttribute('size', "50");
        mySpan.appendChild(myElement);


    }

    function fncDeleteElement() {

        var mySpan = document.getElementById('mySpan');

        var myLine = document.getElementById('hdnLine');

        if (myLine.value > 1)
        {
            // Remove input file
            var deleteFile = document.getElementById("file" + myLine.value);
            mySpan.removeChild(deleteFile);


            myLine.value--;
        }
    }
</script>
<div class="row">
    <div class="page-header">
        <h1>
            <?= $page_title ?>
        </h1>
    </div>
</div>
<div class="row">

    <?php echo $form['form']; ?>
    <div class="form-group <?= (form_error('product_name[thai]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">ชื่อ</label>
        <div class="col-sm-6">
            <?php echo $form['product_name[thai]']; ?>
        </div>
    </div>

    <div class="form-group <?= (form_error('product_name[english]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
            <?php echo $form['product_name[english]']; ?>
        </div>
    </div> 

    <div class="form-group <?= (form_error('product_price')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">ราคา</label>
        <div class="col-sm-2">
            <?php echo $form['product_price']; ?>
        </div>
        <span>บาท</span>
    </div>

    <div class="form-group">
        <div class="col-sm-2" ></div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('width')) ? 'has-error' : '' ?>">
                <label class="col-sm-4 control-label">ความกว้าง</label>
                <div class="col-sm-5">
                    <?php echo $form['width']; ?>
                </div>
                <span>cm.</span>
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('hight')) ? 'has-error' : '' ?>">
                <label class="col-sm-3 control-label">ความสูง</label>
                <div class="col-sm-5">
                    <?php echo $form['hight']; ?>
                </div>
                <span>cm.</span>
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('weight')) ? 'has-error' : '' ?>">
                <label class="col-sm-3 control-label">น้ำหนัก</label>
                <div class="col-sm-5">
                    <?php echo $form['weight']; ?>
                </div>
                <span>kg.</span>
            </div>
        </div>
    </div>

    <div class="form-group <?= (form_error('detail[thai]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">รายละเอียด</label>
        <div class="col-sm-5">
            <?php echo $form['detail[thai]']; ?>               
        </div>
    </div>

    <div class="form-group <?= (form_error('detail[english]')) ? 'has-error' : '' ?>">
        <label class="col-sm-2 control-label">Detail(EN)</label>
        <div class="col-sm-5">
            <?php echo $form['detail[english]']; ?>                 
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">ประเภทสินค้า</label>
        <div class="col-sm-3">
            <select class="form-control">
                <option>Type 1</option>
                <option>Type 2</option>
                <option>Type 3</option>
                <option>Type 4</option>
                <option>Type 5</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">รูปภาพ :</label>
        <div class="col-sm-10">
            <div class="col-sm-6" >
                <div class="form-group <?= (form_error('img_front')) ? 'has-error' : '' ?>">
                    <label class="col-sm-2 control-label">ด้านหน้า</label>
                    <div class="col-sm-9">
                        <?php echo $form['img_front']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group <?= (form_error('img_back')) ? 'has-error' : '' ?>">
                    <label class="col-sm-2 control-label">ด้านหลัง</label>
                    <div class="col-sm-9">
                        <?php echo $form['img_back']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group <?= (form_error('img_right')) ? 'has-error' : '' ?>">
                    <label class="col-sm-2 control-label">ด้านขวา</label>
                    <div class="col-sm-9">
                        <?php echo $form['img_right']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group <?= (form_error('img_left')) ? 'has-error' : '' ?>">
                    <label class="col-sm-2 control-label">ด้านซ้าย</label>
                    <div class="col-sm-9">
                        <?php echo $form['img_left']; ?>
                    </div>
                </div>
            </div>  
        </div>
    </div>



    <div class="form-group">
        <label class="col-sm-2 control-label">รูปภาพอื่น ๆ :</label>
        <div class="col-sm-3">
            <input type="file"  class="form-control" size="50" name="fileUpload1">			
            <span id="mySpan"></span>
            <input id='hdnLine' name="hdnLine" type="hidden" value="1">
            <br>
            <input name="btnCreate" type="button" value="+" class="btn btn-outline btn-circle btn-success btn-sm" onClick="JavaScript:fncCreateElement();">
            <input name="btnDelete" type="button" value="-" class="btn btn-outline btn-circle btn-danger btn-sm" onClick="JavaScript:fncDeleteElement();">

        </div>
    </div>


    <div class="form-group" align='center'>
        <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
        <?= anchor('Products', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>
    </div>
    <?php echo form_close(); ?>
</div>


