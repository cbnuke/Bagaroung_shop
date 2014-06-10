<div class="row">
    <div class="page-header">
        <h1>
            <?= $page_title ?>
        </h1>
    </div>
</div>
<!-- Button trigger modal -->
<button class="btn btn-outline btn-circle btn-success btn-sm" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus fa-fw"></i>
</button>
<div class="row">
    <form class="form-horizontal" role='form'>
        <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อ</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" id="" placeholder="ชื่อโปรโมชั่น">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="" id="" placeholder="Promotion name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">รายละเอียด</label>
            <div class="col-sm-3">
                <textarea class="form-control" rows="3" placeholder="รายละเอียดโปรโมชั่น"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Detail</label>
            <div class="col-sm-3">
                <textarea class="form-control" rows="3" placeholder="Detail of Promotion" ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">วันเริ่มต้น</label>
            <div class="col-sm-5">

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">วันสิ้นสุด</label>
            <div class="col-sm-5">

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">รูปภาพ</label>
            <div class="col-sm-9">
                <input type="file" name="" id="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">สินค้าโปรโมชั่น</label>                
            <div class="col-sm-6">
                <div class="pull-left">
                    <!-- Button trigger modal -->
                    <button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                        Launch demo modal
                    </button>
                    <button class="btn btn-outline btn-circle btn-success btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i></button> 
                </div>
                <br>
                <table class="table table-responsive">
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
                            <td align="center"><button class="btn btn-outline btn-circle btn-danger btn-sm"><i class="fa fa-minus fa-fw"></i></button></td>
                            <td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                            <td>ชื่อกระเป๋าแบบที่ 1</td>
                            <td align="center">1000</td>
                            <td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>
                        </tr>
                        <tr>
                            <td align="center"><button class="btn btn-outline btn-circle btn-danger btn-sm"><i class="fa fa-minus fa-fw"></i></button></td>
                            <td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>
                            <td>ชื่อกระเป๋าแบบที่ 2</td>
                            <td align="center">1000</td>
                            <td><input type="text" name="" value=""><span>&nbsp;บาท</span></td>
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


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">เลือกสินค้า</h4>
                </div>
                <div class="modal-body">
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
                                    <input type="checkbox" value="">                                            
                                </td>
                                <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                <td>1390</td>
                                <td>Bag Type</td>                               
                            </tr> 
                            <tr>
                                <td>
                                    <input type="checkbox" value="">                                            
                                </td>
                                <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                <td>1390</td>
                                <td>Bag Type</td>                               
                            </tr> 
                            <tr>
                                <td>
                                    <input type="checkbox" value="">                                            
                                </td>
                                <td><img data-src="holder.js/100x100/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">  </td>
                                <td>กระเป๋า---กระเป๋า---กระเป๋า---กระเป๋า</td>  
                                <td>1390</td>
                                <td>Bag Type</td>                               
                            </tr> 

                        </tbody>

                    </table> 
                </div>
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-primary">ตกลง</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

</div>

