<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Mervenin ekledikleri-->
  <!-- Import google fonts - Heading first/ text second -->
  <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="dist/css/icons.css">
  <link rel="stylesheet" href="dist/css/main.css">
  <link rel="stylesheet" href="dist/css/plugins.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <link rel="stylesheet" href="dist/css/bootstrap.css">
  <!--Kaba değerlendirme tablo animasyonu css i -->
  <link rel="stylesheet" href="dist/css/accordion2.css"> 
  <!--Kaba değerlendirme duallistbox select css i -->
  <link rel="stylesheet" href="dist/css/bootstrap-duallistbox.css">


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Calendar:)) -->
    <link rel="stylesheet" href="bower_components\fullcalendar\dist\fullcalendar.min.css">
    <link rel="stylesheet" href="bower_components\fullcalendar\dist\fullcalendar.css">
    <link rel="stylesheet" href="bower_components\fullcalendar\dist\fullcalendar.print.min.css" media="print">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
</script>

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- Tablo cizgileri için css yazdım. -->
<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th{
  border:1px solid #51bcdc;
  font-size: 18px
}
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-success">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">10 tane bildirim var.</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugün 5 Yeni üye sisteme katıldı.
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Sayfada yer almayan ve tasarım problemlerine neden olabilecek çok uzun açıklamalar burada.
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 Yeni üye sisteme katıldı.
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> Profilini güncelleme zamanı.
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>  
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/avatar3.png" class="user-image" alt="User Image">
                <span class="hidden-xs">Merve Tunçel</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/avatar3.png" class="img-circle" alt="User Image">

                  <p>
                    Merve Tunçel - Web Developer
                    <small>Member since Nov. 2017</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-6 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Çıkış</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/avatar3.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Merve Tunçel</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Çevrimiçi</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"></li>
          <li>
            <a href="index.html">
              <i class="fa fa-book"></i> 
              <span>Öğrenci Bilgileri</span>
            </a>
          </li>
          <li>
            <a href="index_p.html">
              <i class="fa fa-book"></i> 
              <span>Personel Bilgileri</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Kaba Değerlendirme Oluştur
          <small>...........</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
          <li><a href="#">Merve Tunçel</a></li>
          <li class="active">Kaba Değerlendirme</li>
        </ol>
      </section>

      <!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="contentwrapper">
                  <!--Content wrapper-->
                  <div id="ContentPlaceHolder1_pnlgenel">

                   <div class="col-lg-16 ">
                     <div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">
                      <!-- Start .panel -->
                      <div class="panel-heading">
                        <h4 class="panel-title">Kaba Değerlendirme Formu</h4>
                      </div>

                      <div class="panel-body pt0 pb0">

                        <div class="form-horizontal group-border stripped">

                         <!-- Start .form-group 2 -->
                         <div class="form-group">

                          <div class="row">

                            <label class="col-md-2 control-label" style="width: 150px"><i class="renk">*&nbsp;</i>T.C. No:</label>
                            
                            <div class="col-md-2">
                              <input  type="text" maxlength="50" class="form-control" placeholder="T.C. No">
                              <span style="color:Red;font-weight:bold;"></span>
                            </div>

                            <label class="col-sm-2 control-label" style="width: 150px"><i class="renk">*&nbsp;</i>Adı Soyadı:</label>
                            <div class="col-md-2">
                              <input type="text" maxlength="50" class="form-control" placeholder="Adı Soyadı">
                              <span style="color:Red;font-weight:bold;"></span>
                            </div>

                            <label class="col-md-2 control-label" style="width: 150px"><i class="renk">*&nbsp;</i>Değerlendirme Tarihi:</label>
                            <div class="col-md-2">
                              <input type="text" maxlength="50" class="form-control" placeholder="Değerlendirme Tarihi">
                              <span  style="color:Red;font-weight:bold;"></span>
                            </div>

                          </div>
                        </div>
                        <!-- End .form-group 2 -->

                        <!-- Start .form-group 3 -->
                        <div class="form-group">
                          <div class="row">
                            <label class="col-sm-2 control-label" style="width: 150px"><i class="renk">*&nbsp;</i>Sınıfı:</label>                            
                            <div class="col-md-2">
                              <input  type="text" maxlength="50" class="form-control" placeholder="Sınıfı">
                              <span style="color:Red;font-weight:bold;"></span>
                            </div>

                            <label class="col-md-2 control-label" for="">Eğitim Başlama Tarihi:</label>
                            <div class="col-md-2">
                              <div class=" input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" value="18.09.2017" maxlength="10" class="form-control" placeholder="gg.AA.yyyy">
                              </div>
                            </div>

                            <label class="col-md-2 control-label" for="">Eğitim Bitiş Tarihi:</label>
                            <div class="col-lg-2 col-md-4">
                             <div class=" input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <input type="text" maxlength="10" class="form-control" placeholder="gg.AA.yyyy">
                             </div>
                           </div>

                         </div>
                       </div>
                       <!-- End .form-group 3 -->

                       <!-- Start .form-group 4 -->
                       <div class="form-group">
                        <div class="row">
                          <label class="col-md-2 control-label" style="width: 150px">Değerlendiren:</label>
                          <div class="col-md-9">
                            <input type="text" maxlength="16" class="form-control" placeholder="Seçiniz...">
                          </div>
                        </div>
                      </div>
                      <!-- End .form-group 4 -->

                      <!-- Start .form-group 5 -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-9" style="padding-left: 167px;">
                            <select multiple="multiple" size="10" name="duallistbox_demo2" class="demo2">
                              <!-- Dikkat : Daha sonra derleri veri tabannda tutup oradan çekeceğiz. -->
                              <option value="option1">OKUMA YAZMA</option>
                              <option value="option2">ÖĞRENMEYE HAZIRLIK</option>
                              <!-- <option value="option3" selected="selected">KEYİF :P</option> -->
                              <option value="option4">MATEMATİK</option>
                            </select>
                          </div>                          
                        </div>
                        <label class="col-lg-yeni3 col-md-1 control-label" for=""></label>
                        <div class="col-lg-10 col-md-9" style="padding-left: 52px;">
                          <br>
                          <button type="button" class="btn btn-info" onclick="myFunction()">Button</button>
                          <br><br>
                          <a class="col-lg-yeni16 col-md-3 btn btn-success mr5 mb10" title="Değerlendir">
                            <i class="fa fa-folder"></i>Değerlendir
                          </a>
                          <br>
                        </div>
                      </div>
                      <!-- End .form-group 5 -->


                      <!-- End .form-group 4 -->
                      <!-- <label class="col-lg-yeni3 col-md-1 control-label" for=""></label>
                      <div class="col-lg-10 col-md-9">
                        <br>
                        <a class="col-lg-yeni16 col-md-3 btn btn-success mr5 mb10" title="Değerlendir">
                          <i class="fa fa-folder"></i>Değerlendir
                        </a>
                      </div> -->


                    </div>
                  </div>
                  <i class="renk">*</i> ile işaretli alanların doldurulması zorunludur!
                  <br>
                  <span style="color:Red;font-weight:bold;"></span>
                </div>
                <!-- End .panel -->
                <a class="btn btn-success mr5 mb10" title="Kaydet"><i class="glyphicon glyphicon-ok">&nbsp;<span class="spanfont">Kaydet</span></i></a>
                <a class="btn btn-success mr5 mb10" title="Sil"><i class="glyphicon glyphicon-remove">&nbsp;<span class="spanfont">Sil</span>&nbsp;</i></a>
                <a class="btn btn-success mr5 mb10" title="Düzenle"><i class="glyphicon glyphicon-edit">&nbsp;<span class="spanfont">Düzenle</span>&nbsp;</i></a>
                <a class="btn btn-success mr5 mb10" title="Yazdır"><i class="glyphicon glyphicon-print">&nbsp;<span class="spanfont">Yazdır</span>&nbsp;</i></a>
              </div>

              <!-- First col-md-16 ending -->

              <!--Kaba değerlendirme tablo animasyonu html i -->

              <div class="col-lg-16">
                <div class="panel panel-default  toggle panelMove panelRefresh">
                  <div class="panel-body" id="toggle_deneme">
                    <div class="col-lg-16">
                      <!--OKUMA YAZMA starting -->
                      <div class="accordion collapse in">
                        <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; OKUMA YAZMA</button>
                        <div class="panel_mt">  
                          <div class="accordion1Content">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                              <tbody>
                                <tr>
                                  <th>KAZANIMLAR</th>
                                  <th>EVET</th>
                                  <th>HAYIR</th>
                                  <th>ACIKLAMA</th>
                                </tr>

                                <?php
                                $con = mysqli_connect("localhost","root","123456","project");
                                mysqli_set_charset($con, "utf8");

                                if (mysqli_connect_errno())
                                {
                                  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
                                }
                                $datam = mysqli_query($con,"SELECT * FROM kazanımlar ORDER BY kazanım_name ASC");

                                while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                <tr>
                                  <td>
                                    <?php echo $write['kazanım_name']; ?>
                                  </td>
                                  <td>
                                    <?php echo $write['evet']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['hayır']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['acıklama']; ?>
                                  </td>  
                                </tr>
                                <?php } ?> 
                              </tbody>
                            </table>
                          </div>          
                        </div>
                      </div>
                      <!--OKUMA YAZMA ending -->

                      <!--ÖĞRENMEYE HAZIRLIK starting -->
                      <div class="accordion collapse in">
                        <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; ÖĞRENMEYE HAZIRLIK</button>
                        <div class="panel_mt">  
                          <div class="accordion1Content">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                              <tbody>
                                <tr>
                                  <th>KAZANIMLAR</th>
                                  <th>EVET</th>
                                  <th>HAYIR</th>
                                  <th>ACIKLAMA</th>
                                </tr>

                                <?php
                                $con = mysqli_connect("localhost","root","123456","project");
                                mysqli_set_charset($con, "utf8");

                                if (mysqli_connect_errno())
                                {
                                  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
                                }
                                $datam = mysqli_query($con,"SELECT * FROM ogrenmeye_hazirlik ORDER BY kazanımlar_o ASC");

                                while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                <tr>
                                  <td>
                                    <?php echo $write['kazanımlar_o']; ?>
                                  </td>
                                  <td>
                                    <?php echo $write['evet_o']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['hayir_o']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['aciklama_o']; ?>
                                  </td>  
                                </tr>
                                <?php } ?> 
                              </tbody>
                            </table>
                          </div>          
                        </div>
                      </div>
                      <!--ÖĞRENMEYE HAZIRLIK ending -->

                      <!--MATEMATİK starting -->
                      <div class="accordion collapse in">
                        <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; MATEMATİK</button>
                        <div class="panel_mt">  
                          <div class="accordion1Content">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                              <tbody>
                                <tr>
                                  <th>KAZANIMLAR</th>
                                  <th>EVET</th>
                                  <th>HAYIR</th>
                                  <th>ACIKLAMA</th>
                                </tr>

                                <?php
                                $con = mysqli_connect("localhost","root","123456","project");
                                mysqli_set_charset($con, "utf8");

                                if (mysqli_connect_errno())
                                {
                                  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
                                }
                                $datam = mysqli_query($con,"SELECT * FROM mathematics ORDER BY mathematic_id ASC");

                                while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                <tr>
                                  <td>
                                    <?php echo $write['mathematic']; ?>
                                  </td>
                                  <td>
                                    <?php echo $write['evet_m']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['hayir_m']; ?>
                                  </td> 
                                  <td>
                                    <?php echo $write['aciklama_m']; ?>
                                  </td>  
                                </tr>
                                <?php } ?> 
                              </tbody>
                            </table>
                          </div>          
                        </div>
                      </div>
                      <!--MATEMATİK ending -->

                      <!--TESTİNG for Toggle starting -->
                      <div class="accordion collapse in">
                        <button class="accordion_mt">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; DENEME</button>
                        <div class="panel_mt">  
                          <div class="accordion1Content">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;">
                              <tbody>
                                <tr>
                                  <th>KAZANIMLAR</th>
                                  <th>EVET</th>
                                  <th>HAYIR</th>
                                  <th>ACIKLAMA</th>
                                </tr>

                                <?php
                                $con = mysqli_connect("localhost","root","123456","project");
                                mysqli_set_charset($con, "utf8");

                                if (mysqli_connect_errno())
                                {
                                  echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();
                                }
                                $datam = mysqli_query($con,"SELECT * FROM mathematics ORDER BY mathematic_id ASC");

                                while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                <tr>
                                  <td>
                                    <?php echo $write['mathematic']; ?>
                                  </td>
                                  <td>
                                    <input type="checkbox" name="evet">
                                  </td> 
                                  <td>
                                    <input type="checkbox" name="hayır">
                                  </td> 
                                  <td>
                                    <input type="text" name="açıklama">
                                  </td>  
                                </tr>
                                <?php } ?> 
                              </tbody>
                            </table>
                          </div>          
                        </div>
                      </div>
                      <!--TESTİNG for Toggle ending -->

                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Calendar :)) -->
  <script src="bower_components\fullcalendar\dist\fullcalendar.min.js"></script>
  <script src="bower_components\fullcalendar\dist\fullcalendar.js"></script>
  <script src="bower_components\moment\moment.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->

  <!-- Toggle denemesi -->
  <script>
    function myFunction() {
      var x = document.getElementById("toggle_deneme");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
  </script>

  <!-- DualListbox ın js si -->
  <script src="dist/js/jquery.bootstrap-duallistbox.js"></script>
  <script>
    var demo2 = $('.demo2').bootstrapDualListbox({
      nonSelectedListLabel: 'Dersler',
      selectedListLabel: 'Seçilen Dersler',
      preserveSelectionOnMove: 'moved',
      moveOnSelect: false,
      // nonSelectedFilter: '....'
    });
  </script>

  <!--Kaba değerlendirme tablo animasyonu js si -->
  <script>
    var acc = document.getElementsByClassName("accordion_mt","accordion_mt2");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
  </script>

  
  <script>
    $(function () {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
      {
        title          : 'All Day Event',
        start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
        ],
        editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

</body>
</html>
