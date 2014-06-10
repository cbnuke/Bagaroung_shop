
<div class="row">
    <div class="page-header">
        <h1>
            <?= $page_title ?>
        </h1>
    </div>
</div>
<div class="row">
    
        <form class="form-horizontal" role='form'>
            <div class="form-group">
                <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(TH)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="" id="" placeholder="ชื่อประเภทสินค้า">
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-2 control-label">ชื่อประเภทสินค้า(EN)</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="" id="" placeholder="Product Type Name">
                </div>
            </div>
            <div aling="center">
                <input type="submit"  class="btn btn-success btn-lg" name="save_product_type" value="บันทึก" >
                <?= anchor('ProductTypes','ยกเลิก','class="btn btn-danger btn-lg"')?> 
            </div>
        </form>
    
</div>

