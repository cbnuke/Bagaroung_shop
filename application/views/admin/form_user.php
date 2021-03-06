
<div class="row">
    <div class="page-header">
        <h1>
            <?= $title ?>
        </h1>
    </div>
</div>
<div class="row" > 
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'form_user');
    if ($mode == 'edit') {
        echo form_open('', $attributes);
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $username = $user['username'];
        $password = set_value('password_old');
        $user_type = '1';
    } else {
        echo form_open('Users/add', $attributes);
        $firstname = set_value('firstname');
        $lastname = set_value('lastname');
        $username = set_value('username');        
        $password = '';
        $user_type = '1';
    }
    ?> 
    
    <div class="form-group" id="error">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
            <div class="alert alert-danger">
                 <?php
                    $e = validation_errors();
                    if ($e != '') {
                        $error = 'FALSE';
                    } else {
                        $error = 'TRUE';
                    }
                    echo $e;
                    ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ชื่อ</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="ชื่อ" value="<?= $firstname; ?>">
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('firstname', '<font color="error">', '</font>'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">นามสกุล</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="นามสกุล" value="<?= $lastname; ?>">
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('lastname', '<font color="error">', '</font>'); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $username; ?>">
        </div> 
        <div class="col-sm-4" id="error">                
            <?php echo form_error('username', '<font color="error">', '</font>'); ?>
        </div>
    </div>
    <?php
    if ($mode == 'edit') {
        ?>
        <div class="form-group" id="pass_old">
            <label class="col-sm-2 control-label"  >Password Old</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password_old"  placeholder="Old Password" value="<?= $password ?>" >
            </div>
            <div class="col-sm-4">                
                <?php echo form_error('password_old', '<font color="error">', '</font>'); ?>
            </div>
        </div>
    <?php } ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('password', '<font color="error">', '</font>'); ?>
        </div>
    </div>  
    <div class="form-group">
        <label class="col-sm-2 control-label">Confrim Password</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password_con" id="password_con"  placeholder="Confrim Password" >
        </div>
        <div class="col-sm-4" id="error">                
            <?php echo form_error('password_con', '<font color="error">', '</font>'); ?>
        </div>
    </div>
    <hr>
    <div class="form-group" >
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4" align="center">
            <input type="submit"  class="btn btn-success btn-lg" name="save" id="save" value="บันทึก" >
            <?= anchor('Users', 'ยกเลิก', 'class="btn btn-danger btn-lg"') ?> 
        </div>
    </div>
</form>

</div>


<script>
    $(document).ready(function() {
 var error = '<?= $error ?>';

        if (error == 'TRUE') {
            $('#error').hide(true);
        } else
        {
            $('#error').hide(true);
        }
    });


</script>   

