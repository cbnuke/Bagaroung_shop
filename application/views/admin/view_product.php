<div class="row">
    <div class="page-header">
        <h1>
            <?= 'รายละเอียด' . $title ?>
        </h1>
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <form class="form-horizontal" role='form'>
        <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อ</label>
            <div class="col-sm-6">
                <label class="form-control" name="" id=""><?= unserialize($data ['product_name'])['thai']; ?></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
                <label class="form-control" name="" id=""><?= unserialize($data ['product_name'])['english']; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">ราคา</label>
            <div class="col-sm-2">
                <label class="form-control" name="" id=""><?= $data ['product_price']; ?></label>
            </div>
            <span>บาท</span>
        </div>
        <div class="form-group">
            <div class="col-sm-2" ></div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <label class="col-sm-4 control-label">ความกว้าง</label>
                    <div class="col-sm-5">
                        <label class="form-control" name="" id=""><?= $data ['width']; ?></label>                                          
                    </div>
                    <span>cm.</span>
                </div>
            </div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">ความสูง</label>
                    <div class="col-sm-5">
                        <label class="form-control" name="" id=""><?= $data ['hight']; ?></label>
                    </div>
                    <span>cm.</span>
                </div>
            </div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">น้ำหนัก</label>
                    <div class="col-sm-5">
                        <label class="form-control" name="" id=""><?= $data ['weight']; ?></label>
                    </div>
                    <span>kg.</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2" ></div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <label class="col-sm-5 control-label">ความกว้างด้านบน</label>
                    <div class="col-sm-5">
                        <label class="form-control" name="" id=""><?= $data ['top_width']; ?></label>
                    </div>
                    <span>cm.</span>
                </div>
            </div>
            <div class="col-sm-3" >
                <div class="form-group">
                    <label class="col-sm-5 control-label">ความกว้างฐาน</label>
                    <div class="col-sm-5">
                        <label class="form-control" name="" id=""><?= $data ['base_width']; ?></label>
                    </div>
                    <span>cm.</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">รายละเอียด</label>
            <div class="col-sm-5">
                <!--<p class="form-control form-control-static"></p>-->
                <textarea class="form-control" rows="5" placeholder="รายละเอียดสินค้า" readonly=""><?= unserialize($data ['detail'])['thai']; ?></textarea>                    
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Detail</label>
            <div class="col-sm-5">
                <!--                <label class=" form-control form-control-static"></label>-->
                <textarea class="form-control" rows="5" readonly=""><?= unserialize($data ['detail'])['english']; ?></textarea>                    
            </div>
        </div> 
        <div class="form-group">
            <label class="col-sm-2 control-label">ประเภท</label>
            <div class="col-sm-3">
                <label class="form-control" name="" id=""><?= unserialize($data['type_name'])['thai']; ?></label>
            </div>
        </div>        
        <div id="view_img1" class="form-group">
            <label class="col-sm-2 control-label">รูปภาพ</label>
            <div class="col-sm-10">

                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <?php echo img($data['img_front'], array('class' => 'img-responsive thumbnail', 'style' => 'max-width:100%;')); ?>
                        <!--<img src="<?= $data['img_front'] ?>" class="img-responsive" style="max-width:100%;" alt="Generic placeholder thumbnail">-->
                        <h4>ด้านหน้า</h4>                        
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder"> 
                        <?php echo img($data['img_back'], array('class' => 'img-responsive thumbnail', 'style' => 'max-width:100%;')); ?>
                        <!--<img data-src="holder.js/200x200/auto/vine" class="img-responsive"style="max-width:100%;" alt="Generic placeholder thumbnail">-->
                        <h4>ด้านหลัง</h4>                        
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">  
                        <?php echo img($data['img_left'], array('class' => 'img-responsive thumbnail', 'style' => 'max-width:100%;')); ?>
                        <!--<img data-src="holder.js/200x200/auto/sky" class="img-responsive" style="max-width:100%;" alt="Generic placeholder thumbnail">-->
                        <h4>ด้านซ้าย</h4>                        
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder"> 
                        <?php echo img($data['img_right'], array('class' => 'img-responsive thumbnail', 'style' => 'max-width:100%;')); ?>
                        <!--<img data-src="holder.js/200x200/auto/vine" class="img-responsive" style="max-width:100%;"  alt="Generic placeholder thumbnail">-->
                        <h4>ด้านขวา</h4>                       
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">รูปภาพอื่น ๆ :</label>
            <div class="col-sm-10"> 
                <?php
                if ($images == NULL || count($images) == 0) {
                    
                } else {
                    $i = 1;
                    foreach ($images as $img) {
//                    for ($j = 0; $j < 21; $j++) {
                        if ($i % 4 == 0) {
                            echo '<div class="item">';
                            echo '<div class="row">';
                        }
                        ?>
                        <div class="col-sm-3 col-xs-6"><a href="<?= base_url() . 'assets/img/' . $img['img_full']; ?>" class="group3"><?php echo img($img['img_full'], array('class' => 'img-responsive thumbnail', 'style' => 'max-width:100%;')); ?></a>
                        </div>
                        <?php
                        if ($i % 4 == 0) {
                            echo '</div>';
                            echo '</div>';
                        }
                        $i++;
                    }
                }
                ?>    
            </div>

            <div class="form-group" align='center'>                 
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-9 ">
                    <br>
                    <?= anchor('Products/edit/'.$data['id'], '<i class="fa fa-pencil fa-lg"></i>&nbsp;แก้ไข', 'type="button" class="btn btn-info btn-lg"') ?>
                    <?= anchor('Products', 'กลับ', 'class="btn btn-success btn-lg"'); ?>
                </div>
            </div>

        </div>
    </form>
</div>


