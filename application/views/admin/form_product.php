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
                <label class="col-sm-5 control-label">ความกว้าง</label>
                <div class="col-sm-5">
                    <?php echo $form['width']; ?>
                </div>
                <span>cm.</span>
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('hight')) ? 'has-error' : '' ?>">
                <label class="col-sm-5 control-label">ความสูง</label>
                <div class="col-sm-5">
                    <?php echo $form['hight']; ?>
                </div>
                <span>cm.</span>
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('weight')) ? 'has-error' : '' ?>">
                <label class="col-sm-5 control-label">น้ำหนัก</label>
                <div class="col-sm-5">
                    <?php echo $form['weight']; ?>
                </div>
                <span>kg.</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2" ></div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('top_width')) ? 'has-error' : '' ?>">
                <label class="col-sm-5 control-label">ความกว้างด้านบน</label>
                <div class="col-sm-5">
                    <?php echo $form['top_width']; ?>
                </div>
                <span>cm.</span>
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="form-group <?= (form_error('base_width')) ? 'has-error' : '' ?>">
                <label class="col-sm-5 control-label">ความกว้างฐาน</label>
                <div class="col-sm-5">
                    <?php echo $form['base_width']; ?>
                </div>
                <span>cm.</span>
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
            <?php echo $form['product_type_id']; ?>
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
    <div class="form-group" align='center'>
        <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
        <?= anchor('Products', 'ยกเลิก', 'class="btn btn-danger btn-lg"'); ?>
    </div>
    <?php echo form_close(); ?>

    <!-- #### jQuery Upload File #### -->
    <!-- The file upload form used as target for the file upload widget -->
    <?= form_open_multipart('upload/do_upload', array('id' => 'fileupload')) ?>
    <h3>รูปภาพอื่นๆ <small>จัดการก่อนทำการ บันทึกสินค้า</small></h3>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
        <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Add files...</span>
                <input type="file" name="userfile" multiple>
            </span>
            <button type="submit" class="btn btn-primary start">
                <i class="glyphicon glyphicon-upload"></i>
                <span>Start upload</span>
            </button>
            <button type="reset" class="btn btn-warning cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Cancel upload</span>
            </button>
            <button type="button" class="btn btn-danger delete">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </button>
            <input type="checkbox" class="toggle">
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    <?= form_close() ?>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">คำแนะนำการใช้งานรูปภาพอื่น</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>จัดการรูปภาพอื่นๆ <strong>ก่อนบันทึก</strong> ข้อมูลสินค้า</li>
                <li>ขนาดของไฟล์รูปภาพใหญ่สุดได้ที่ <strong>5 MB</strong></li>
                <li>ชนิดไฟล์ที่รองรับ (<strong>JPG, GIF, PNG</strong>)</li>
                <li>คุณสามารถ <strong>drag &amp; drop(ลากวาง)</strong> ไฟล์รูปจากเครื่องลงที่เว็บนี้ได้เลย (รายละเอียด <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
            </ul>
        </div>
    </div>
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
        <td>
        <span class="preview"></span>
        </td>
        <td>
        <p class="name">{%=file.name%}</p>
        <strong class="error text-danger"></strong>
        </td>
        <td>
        <p class="size">Processing...</p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
        {% if (!i && !o.options.autoUpload) { %}
        <button class="btn btn-primary start" disabled>
        <i class="glyphicon glyphicon-upload"></i>
        <span>Start</span>
        </button>
        {% } %}
        {% if (!i) { %}
        <button class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Cancel</span>
        </button>
        {% } %}
        </td>
        </tr>
        {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
        <td>
        <span class="preview">
        {% if (file.thumbnailUrl) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
        {% } %}
        </span>
        </td>
        <td>
        <p class="name">
        {% if (file.url) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
        {% } else { %}
        <span>{%=file.name%}</span>
        {% } %}
        </p>
        {% if (file.error) { %}
        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
        {% } %}
        </td>
        <td>
        <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
        {% if (file.deleteUrl) { %}
        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
        <i class="glyphicon glyphicon-trash"></i>
        <span>Delete</span>
        </button>
        <input type="checkbox" name="delete" value="1" class="toggle">
        {% } else { %}
        <button class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Cancel</span>
        </button>
        {% } %}
        </td>
        </tr>
        {% } %}
    </script>
    <!-- #### End jQuery Upload File #### -->
</div>


