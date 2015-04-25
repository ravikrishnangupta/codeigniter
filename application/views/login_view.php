<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Outdoor Blinds Admin Panel</title>
  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url()?>admin-assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="<?=base_url()?>admin-assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- Timeline CSS -->
  <link href="<?=base_url()?>admin-assets/dist/css/timeline.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?=base_url()?>admin-assets/dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?=base_url()?>admin-assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="tps://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="tps://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?=validation_errors()?>
                        <?=form_open('verifylogin')?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="username" placeholder="Username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="passowrd" name="password" placeholder="Password" >
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="form-control btn-success" type="submit" name="submit" value="Login" >
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>