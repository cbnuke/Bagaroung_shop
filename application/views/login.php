<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Bag Aroung Admin</title>
        
       <!-- Core CSS - Include with every page -->       
        <?php echo css('bootstrap.css'); ?>
        <?php echo css('font-awesome.css'); ?>

        <!-- SB Admin CSS - Include with every page -->       
        <?php echo css('sb-admin.css'); ?>

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!--                                    
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                                            </label>
                                                                        </div>
                                    -->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a href="index.php" class="btn btn-lg btn-success btn-block">Login</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
        
        <!-- Core Scripts - Include with every page -->
         <?=js('jquery.js');?>
        <?=js('bootstrap.js');?>      

        <!-- SB Admin Scripts - Include with every page -->
        <?=js('sb-admin.js');?>

    </body>

</html>
