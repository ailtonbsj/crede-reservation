<?php

namespace Orkidea\Core;

session_start();
include 'strings.php';
include 'api/Orkidea/ModuleLoader.php';
include 'api/Orkidea/Group.php';

$moduleLoader = new ModuleLoader();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $S['MainProjectName'] . ' ' . $S['ProjectName'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">
  <!-- Bootstrap datetimepicker -->
  <link rel="stylesheet" href="./lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
  <!-- Bootstrap Toogle -->
  <link rel="stylesheet" href="./lib/bootstrap-toggle/css/bootstrap-toggle.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="./lib/select2/css/select2.min.css">
  <!-- Pace -->
  <script src="./plugins/pace/pace.min.js"></script>
  <link href="./plugins/pace/pace.min.css" rel="stylesheet" />

  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style type="text/css">
/* width */
::-webkit-scrollbar {
    width: 5px;
    height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}
</style>

</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dash.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?= $S['MainProjectName'][0] ?></b><?= $S['ProjectName'][0] ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= $S['MainProjectName'] ?></b><?= $S['ProjectName'] ?> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="./dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= ucfirst(Authenticator::hasAuthority()) ?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
          	<a href="#" id="btn-logout" title="<?= $S['Logout'] ?>"><i class="fa fa-power-off"></i></a>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar" title="<?= $S['Themes'] ?>"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="./dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p><?= ucfirst(Authenticator::hasAuthority()) ?></p>
          <a href="#"><i class="fa fa-bank"></i>
          	<?php
          	$tk = explode('/',Group::getHumanGid($_SESSION['gid']));
          	echo $tk[count($tk)-1];
          	?></a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <template id="item-menu">
        <li>
          <a href="#">
            <i class="fa"></i> <span></span>
          </a>
        </li>
      </template>
      <ul id="main-menu" class="sidebar-menu" data-widget="tree">
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">
      <h1>
        Fixed Layout
        <small>Blank example to the fixed layout</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <!-- AREA OF VIEWS BEGIN -->

<?php 

$moduleLoader->loadViews();

 ?>

      <!-- AREA OF VIEWS END -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?= $S['Version'] ?></b> 0.0.1
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://ailtonbsj.github.io">ailton.b.s.j</a>. </strong> <?= $S['AllRights'] ?>.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane" id="control-sidebar-home-tab"></div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- orkidea i18n -->
<script type="text/javascript">
  var S = JSON.parse('<?= json_encode($S) ?>');
  var gid = '<?= $_SESSION['gid'];  ?>';
  var gidH = '<?= Group::getHumanGid($_SESSION['gid'])  ?>';
</script>
<!-- jQuery 3 -->
<script src="./lib/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="./lib/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./lib/fastclick/fastclick.js"></script>
<!-- imask -->
<script src="./lib/imask/imask.min.js"></script>
<!-- Moment -->
<script src="./lib/moment/moment.min.js"></script>
<script src="./lib/moment/pt-br.js"></script>
<!-- bootstrap datetimepicker -->
<script src="./lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap toggle -->
<script src="./lib/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<!-- Select2 -->
<script src="./lib/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- Useful lib -->
<script src="./controllers/Useful.js"></script>
<script src="./controllers/Orkidea/Component.js"></script>
<script src="./controllers/Components/MaskedInput.js"></script>
<script src="./controllers/Components/NaturalInput.js"></script>
<script src="./controllers/Components/RealInput.js"></script>
<script src="./controllers/Components/MoneyInput.js"></script>
<script src="./controllers/Components/DateTimeInput.js"></script>
<script src="./controllers/Components/DateInput.js"></script>
<script src="./controllers/Components/TimeInput.js"></script>
<script src="./controllers/Components/TextInput.js"></script>
<script src="./controllers/Components/BooleanToggle.js"></script>
<script src="./controllers/Components/SelectInput.js"></script>
<script src="./controllers/Components/DynamicSelect.js"></script>
<script src="./controllers/App.js"></script>

<!-- Controllers from user -->
<?php 
$moduleLoader->loadControllers();
 ?>

 <script type="text/javascript">

 	$(document).ajaxStart(function() { Pace.restart(); });

    new App();
    Module.modules[Object.keys(Module.modules)[0]].showTableView();
    
  </script>
</body>
</html>