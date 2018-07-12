<?php

$baseUrl = '/crede-reservation/';
$request = explode('?', $_SERVER['REQUEST_URI'], 2);
$request = str_replace($baseUrl, '', $request[0]);

session_start();
switch ($request) {
  case 'en':
    $_SESSION['i18n'] = 'en';
    break;
  default:
    $_SESSION['i18n'] = 'pt-br';
}

include 'strings.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?= $S['MainProjectName'] . ' ' . $S['ProjectName'] ?> | <?= $S['LogIn'] ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="./lib/ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./lib/icheck/skins/square/blue.css">
  <!-- Toastr -->
  <link href="./lib/toastr/toastr.min.css" rel="stylesheet"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css" media="screen">
  	body {
  		height: 80%;
  	}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b><?= $S['MainProjectName'] ?></b><?= $S['ProjectName'] ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?= $S['MsgLogIn'] ?></p>

    <form>
      <div class="form-group has-feedback">
        <input id="user" type="text" class="form-control" placeholder="<?= $S['PlaceHolderLogin'] ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pass" type="password" class="form-control" placeholder="<?= $S['PlaceHolderPass'] ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> <?= $S['RememberMe'] ?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat"><?= $S['SignIn'] ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

 <!--    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="./lib/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./lib/icheck/icheck.min.js"></script>
<!-- Toastr -->
<script src="./lib/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "3000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	$('.btn-primary').click(function(){
        $.post('api/login',{
            'name':$('#user').val(),
            'pass':$('#pass').val()
        }, function(res){
        	console.log(res);
        	if(JSON.parse(res)['status'] == 'success') window.location = 'dash.php';
        	else toastr["error"]("<?= $S['InvalidLogIn'] ?>", "<?= $S['Error'] ?>");
        });
    });

  });
</script>
</body>
</html>