<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Bag Around Admin</title>

        <!-- Core CSS - Include with every page -->       
        <?php echo css('bootstrap.css'); ?>
        <?php echo css('font-awesome.css'); ?>

        <!-- SB Admin CSS - Include with every page -->       
        <?php echo css('sb-admin.css'); ?>

    </head>
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }

    </style>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <form class="form-signin" role="form">
                        <h3>Please Sign In </h3>
                        <fieldset>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="index.php" class="btn btn-lg btn-success btn-block">Sign in</a>
                        </fieldset>
                    </form>



                </div>
            </div>
        </div>



        <!-- Core Scripts - Include with every page -->
        <?= js('jquery.js'); ?>
        <?= js('bootstrap.js'); ?>      

        <!-- SB Admin Scripts - Include with every page -->
        <?= js('sb-admin.js'); ?>

    </body>

</html>
