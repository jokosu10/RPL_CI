<!DOCTYPE html>
<html class="bg-green">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-green">

        <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form method="post" action="<?php echo base_url(); ?>index.php/login">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="nm_user" class="form-control" placeholder="Nama User"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass_user" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <?php echo form_error("pass_user");?>
                    </div>        
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Log in</button>  
				</div>
            </form>
        </div>

        <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>