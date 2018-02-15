<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Personel</b></span>
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
            <a href="">
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
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Tables</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
              <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
            </ul>
          </li>
          <li>
            <a href="pages/calendar.html">
              <i class="fa fa-calendar"></i> <span>Calendar</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-red">3</small>
                <small class="label pull-right bg-blue">17</small>
              </span>
            </a>
          </li>
          <li>
            <a href="pages/mailbox/mailbox.html">
              <i class="fa fa-envelope"></i> <span>Mailbox</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-yellow">12</small>
                <small class="label pull-right bg-green">16</small>
                <small class="label pull-right bg-red">5</small>
              </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Examples</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
              <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
              <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
              <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
              <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
              <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
              <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
              <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
            </ul>
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
          Öğrenci Bilgileri
          <small>...........</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Students</a></li>
          <li class="active">Data tables</li>
        </ol>
      </section>

      <!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Öğrenci Veri Tablosu</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">

                    <form class="form-inline" action="/action_page.php" style="padding-bottom: 10px">
                      <div class="form-group">
                        <label for="email">Adı:</label>
                        <input type="text" class="form-control" id="adi" placeholder="Öğrencinin Adı" name="Öğrenci adı">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Soyadı:</label>
                        <input type="text" class="form-control" id="soyadi" placeholder="Öğrencinin Soyadı" name="Soyad">
                      </div>
                      <button type="submit" class="btn btn-primary">Listele</button>
                    </form>
                    <div class="row">
                      <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>&nbsp;</th>
                              <th>ID</th>
                              <th>İsim</th>
                              <th>Soyisim</th>
                              <th>Cinsiyet</th>
                              <th>Sınıf</th>
                              <th>Devamsızlık</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                               <div class="checkbox-custom">
                                <input id="ContentPlaceHolder1_GrdOGR_chksec_0" type="checkbox" name="ctl00$ContentPlaceHolder1$GrdOGR$ctl02$chksec">
                                <label for="ContentPlaceHolder1_GrdOGR_chksec_0"></label>
                              </div></td>
                              <td>1025</td>
                              <td>Engin</td>
                              <td>Bakır</td>
                              <td>Erkek</td>
                              <td>4</td>
                              <td>C</td>
                            </tr>
                            <tr>
                              <td>
                               <div class="checkbox-custom">
                                <input id="ContentPlaceHolder1_GrdOGR_chksec_0" type="checkbox" name="ctl00$ContentPlaceHolder1$GrdOGR$ctl02$chksec">
                                <label for="ContentPlaceHolder1_GrdOGR_chksec_0"></label>
                               </div></td>
                              <td>1026</td>
                              <td>Merve</td>
                              <td>Tunçel</td>
                              <td>Kız</td>
                              <td>3</td>
                              <td>C</td>
                            </tr>
                            <tr>
                              <td>
                                <div class="checkbox-custom">
                                <input id="ContentPlaceHolder1_GrdOGR_chksec_0" type="checkbox" name="ctl00$ContentPlaceHolder1$GrdOGR$ctl02$chksec">
                                <label for="ContentPlaceHolder1_GrdOGR_chksec_0"></label>
                                </div></td>
                              <td>1027</td>
                              <td>Hatice Şeyma</td>
                              <td>Yiğit</td>
                              <td>Kız</td>
                              <td>2</td>
                              <td>C</td>
                            </tr>
                            <tr>
                              <td>
                                <div class="checkbox-custom">
                                <input id="ContentPlaceHolder1_GrdOGR_chksec_0" type="checkbox" name="ctl00$ContentPlaceHolder1$GrdOGR$ctl02$chksec">
                                <label for="ContentPlaceHolder1_GrdOGR_chksec_0"></label>
                                </div></td>
                              <td>1028</td>
                              <td>Eda</td>
                              <td>Kara</td>
                              <td>Kız</td>
                              <td>1</td>
                              <td>C</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> 
                    <div class="btn-group btn-group-justified" style="padding-bottom: 10px">
                      <div class="btn-group">
                        <a href="ogrenci_ekle.html" class="btn btn-primary" role="button">&nbsp;&nbsp;Ekle&nbsp;&nbsp;</a>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">&nbsp;&nbsp;Sil&nbsp;&nbsp;</button>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">&nbsp;&nbsp;Düzenle&nbsp;&nbsp;</button>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">&nbsp;&nbsp;Yenile&nbsp;&nbsp;</button>
                      </div>
                    </div>             
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <div class="col-md-6">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Engin Bakır - Bilgileri</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="padding-right: 20px; padding-left: 20px;">
                    <div class="row">
                     <ul class="nav nav-tabs">
                       <li class="active"><a data-toggle="tab" href="#home">Notlar</a></li>
                       <li><a data-toggle="tab" href="#menu1">Veli Bilgileri</a></li>
                       <li><a data-toggle="tab" href="#menu2">Öğrenci Bilgileri</a></li>
                       <li><a data-toggle="tab" href="#menu3">Takvim</a></li>
                       <li><a data-toggle="tab" href="#menu4">Mail</a></li>
                     </ul>

                     <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <div class="row">
                          <div class="col-md-12" style="margin-bottom: 10px;">
                            <table id="example23" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Öğretmen</th>
                                  <th>Not</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Nazlı Başak</td>
                                  <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                                </tr>
                                <tr>
                                  <td>Ahmet Atak</td>
                                  <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <div class="row">
                          <div class="col-md-12">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>İsim</th>
                                  <th>Soyisim</th>
                                  <th>Telefon</th>
                                  <th>E-mail</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Neriman</td>
                                  <td>Bakır</td>
                                  <td>05447895632</td>
                                  <td>neriman.bkr@yahoo.com</td>
                                </tr>
                              </tbody>
                              <tbody>
                                <tr>
                                  <td>Cevdet</td>
                                  <td>Bakır</td>
                                  <td>05332648511</td>
                                  <td>cevdet.bkr@yahoo.com</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div id="menu2" class="tab-pane fade">
                        <div class="box box-primary">
                          <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar5.png" alt="User profile picture">

                            <h3 class="profile-username text-center">Engin Bakır</h3>
                            <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                <b>TC</b> <a class="pull-right">20154895748</a>
                              </li>
                              <li class="list-group-item">
                                <b>Adres</b> <a class="pull-right">Lorem ipsum dolor sit amet, consectetur.</a>
                              </li>
                              <li class="list-group-item">
                                <b>Ulaşım</b> <a class="pull-right">Servis</a>
                              </li>
                              <li class="list-group-item">
                                <b>Eğitsel Tanı</b> <a class="pull-right">Excepteur sint occaecat.</a>
                              </li>
                              <li class="list-group-item">
                                <b>BEP</b> <a class="pull-right">engin_bakır.pdf</a>
                              </li>
                              <li class="list-group-item">
                                <b>Dönem Başlayış Tarihi</b> <a class="pull-right">18.09.2017</a>
                              </li>
                              <li class="list-group-item">
                                <b>Dönem Bitiş Tarihi</b> <a class="pull-right">07.06.2018</a>
                              </li>
                            </ul>
                          </div>
                          <!-- /.box-body -->
                        </div>
                      </div>

                       <div id="menu4" class="tab-pane fade">
                <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border"><h3 class="box-title">Compose New Message</h3></div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="form-group"><input class="form-control" placeholder="To: neriman_bkr@yahoo.com"></div>
      <div class="form-group"><input class="form-control" placeholder="Subject:"></div>
      <div class="form-group">
        <ul class="wysihtml5-toolbar" style="">
          <li class="dropdown">
            <a class="btn btn-default dropdown-toggle " data-toggle="dropdown">
              <span class="glyphicon glyphicon-font"></span>
              <span class="current-font">Normal text</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" href="javascript:;" unselectable="on">Heading 4</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" href="javascript:;" unselectable="on">Heading 5</a></li>
              <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" href="javascript:;" unselectable="on">Heading 6</a></li>
            </ul>
          </li>

          <li>
            <div class="btn-group">
              <a class="btn  btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">B</a>
              <a class="btn  btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">I</a>
              <a class="btn  btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">U</a>
              <a class="btn  btn-default" data-wysihtml5-command="small" title="CTRL+S" tabindex="-1" href="javascript:;" unselectable="on">S</a>
            </div>
          </li>

          <li>
            <div class="bootstrap-wysihtml5-insert-link-modal modal fade" data-wysihtml5-dialog="createLink">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Insert link</h3>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control" data-wysihtml5-dialog-field="href">
                    </div> 
                    <div class="checkbox">
                      <label> 
                        <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window
                      </label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save">Insert link</a>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn  btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">
              <span class="glyphicon glyphicon-share"></span>
            </a>
          </li>

          <li>
            <div class="bootstrap-wysihtml5-insert-image-modal modal fade" data-wysihtml5-dialog="insertImage">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Insert image</h3>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control" data-wysihtml5-dialog-field="src">
                    </div> 
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                    <a class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save" href="#">Insert image</a>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn  btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">
              <span class="glyphicon glyphicon-picture"></span>
            </a>
          </li>
        </ul><textarea id="compose-textarea" class="form-control" style="height: 300px; display: none;">             &lt;h1&gt;&lt;u&gt;Heading Of Message&lt;/u&gt;&lt;/h1&gt;
          &lt;h4&gt;Subheading&lt;/h4&gt;
          &lt;p&gt;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
          was born and I will give you a complete account of the system, and expound the actual teachings
          of the great explorer of the truth, the master-builder of human happiness. No one rejects,
          dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
          how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
          is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain.
          &lt;/p&gt;
          &lt;ul&gt;
          &lt;li&gt;List item one&lt;/li&gt;
          &lt;li&gt;List item two&lt;/li&gt;
          &lt;li&gt;List item three&lt;/li&gt;
          &lt;li&gt;List item four&lt;/li&gt;
          &lt;/ul&gt;
          &lt;p&gt;Thank you,&lt;/p&gt;
          &lt;p&gt;John Doe&lt;/p&gt;
        </textarea><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(85, 85, 85) none 0px; outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 100px;"></iframe>
      </div>
      <div class="form-group">
        <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> Attachment
          <input type="file" name="attachment">
        </div>
        <p class="help-block">Max. 32MB</p>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
      </div>
      <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->
</div>
              </div>

                      <div id="menu3" class="tab-pane fade">
                        <div class="col-md-12">
                          <div class="box box-primary">
                            <div class="box-body no-padding">
                              <!-- THE CALENDAR -->
                              <div id="calendar" class="fc fc-unthemed fc-ltr">

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
