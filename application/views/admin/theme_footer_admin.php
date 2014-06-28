<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal-title">Confirm</h4>
            </div>

            <div class="modal-body" id="modal-body">
<!--                <p>You are about to delete one track url, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
                <p class="debug-id"></p>-->
            </div>

            <div class="modal-footer" align="center">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_no"><i class="fa fa-times fa-lg"></i>&nbsp;ไม่</button>
                <a href="#" class="btn btn-danger danger" id="btn_delete" ><i class="fa fa-trash-o fa-lg"></i>&nbsp;ลบ</a>
                <a href="#" class="btn btn-primary yes " id="btn_yes" ><i class="fa fa-check fa-lg"></i>&nbsp;ใช่</a>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        //Examples of how to assign the Colorbox event to elements        
        $(".group3").colorbox({rel: 'group3', transition: "none", width: "75%", height: "75%"});


    });
    $('#confirm').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var info = $(e.relatedTarget).data('info');

        $('.modal-title').html('<i class="fa fa-info-circle fa-lg"></i> คุณต้องการ <strong>' + title + '</strong> <?= $title ?>');
        $('.modal-body').html('<strong>' + title + '<?= $title ?> </strong> : ' + info + '');

        if (id == 1) //edit
        {
            $('#btn_yes').show();
            $('#btn_delete').hide();
            $(this).find('.yes').attr('href', $(e.relatedTarget).data('href'));

        } else if (id == 2) //delete 
        {
            $('#btn_yes').hide();
            $('#btn_delete').show();
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));

        }
        else if (id == 3) //cancle
        {
            $('#btn_yes').show();
            $('#btn_delete').hide();
            $(this).find('.yes').attr('href', $(e.relatedTarget).data('href'));

        } else if (id == 4) //active
        {
            $('#btn_yes').show();
            $('#btn_delete').hide();
            $(this).find('.yes').attr('href', $(e.relatedTarget).data('href'));

        }

    });

</script>
<script>
    $(document).ready(function() {
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel: 'group1'});
        $(".group2").colorbox({rel: 'group2', transition: "fade"});
        $(".group3").colorbox({rel: 'group3', transition: "none", width: "75%", height: "75%"});
        $(".group4").colorbox({rel: 'group4', slideshow: true});
        $('.retina').colorbox({rel: 'retina', transition: 'none', retinaImage: true, retinaUrl: true});

    });
</script>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
</div> <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<div class="footer">                
    <div class="copy">
        <p>Page Generation: {elapsed_time} &copy; CBNUKE & VORD 2014</p>
    </div>
</div>

<!-- Core Scripts - Include with every page -->
<?= js('plugins/metisMenu/jquery.metisMenu.js'); ?>
<?= js('moment.js'); ?>
<?= js('bootstrap-datetimepicker.js'); ?>
<?= js('docs.min.js'); ?>

<!-- SB Admin Scripts - Include with every page -->
<?= js('sb-admin.js'); ?>

</body>
</html>