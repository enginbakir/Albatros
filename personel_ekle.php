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
          Yeni Personel Ekle
          <small>...........</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
          <li><a href="#">Personel</a></li>
          <li class="active">Ekle</li>
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
                        <h4 class="panel-title">Personel Bilgileri</h4>
                      </div>

                      <div class="panel-body pt0 pb0">

                        <div class="form-horizontal group-border stripped">

                         <!-- Start .form-group 2 -->
                         <div class="form-group">

                          <div class="row">

                            <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Adı:</label>
                            
                            <div class="col-md-3">
                              <input name="ctl00$ContentPlaceHolder1$txtAdi" type="text" maxlength="64" id="ContentPlaceHolder1_txtAdi" class="form-control" placeholder="Personel Adı">
                              <span id="ContentPlaceHolder1_lblAdi" style="color:Red;font-weight:bold;"></span>
                            </div>

                            <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Soyadı:</label>
                            <div class="col-md-3">
                              <input name="ctl00$ContentPlaceHolder1$txtSoyadi" type="text" maxlength="64" id="ContentPlaceHolder1_txtSoyadi" class="form-control" placeholder="Personel Soyadı">
                              <span id="ContentPlaceHolder1_lblSoyadi" style="color:Red;font-weight:bold;"></span>
                            </div>

                          </div>
                        </div>
                        <!-- End .form-group 2 -->

                        <!-- Start .form-group 3 -->
                        <div class="form-group">
                          <div class="row">
                            <label class="col-md-2 control-label">Cinsiyet:</label>
                            <div class="col-md-3">
                             <div class="fancy-select">
                              <select name="ctl00$ContentPlaceHolder1$ddlCinsiyet" id="ContentPlaceHolder1_ddlCinsiyet" class="fancy-select form-control fancified" style="width: 1px; height: 1px; display: block; position: absolute; top: 0px; left: 0px; opacity: 0;">
                                <option value="Erkek">Bay</option>
                                <option value="Kız">Bayan</option>

                              </select>
                              <div class="trigger">Bay</div>
                              <ul class="options">
                                <li data-raw-value="Erkek" class="selected">Bay</li>
                                <li data-raw-value="Kız">Bayan</li>
                              </ul>
                            </div>

                          </div>
                          <label class="col-md-2 control-label">T.C. No:</label>
                          <div class="col-md-3">

                            <input name="ctl00$ContentPlaceHolder1$txtTC" type="text" maxlength="11" id="ContentPlaceHolder1_txtTC" class="form-control" placeholder="T.C. Kimlik No">
                            <span id="ContentPlaceHolder1_RegularExpressionValidator1" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
                            <span id="ContentPlaceHolder1_lblTC" style="color:Red;font-weight:bold;"></span>
                          </div>                          
                        </div>
                      </div>

                      <!-- End .form-group 3 -->

                      <!-- Start .form-group 4 -->
                      <div class="form-group">
                        <div class="row">
                          <label class="col-md-2 control-label" for=""><i class="renk">*&nbsp;</i>Ünvanı:</label>
                          <script type="text/javascript">
  //<![CDATA[
    Sys.WebForms.PageRequestManager._initialize('ctl00$ContentPlaceHolder1$ScriptManager1', 'form1', ['tctl00$ContentPlaceHolder1$UpdatePanel1','ContentPlaceHolder1_UpdatePanel1'], [], [], 90, 'ctl00');
      //]]>
      </script>

  <div id="ContentPlaceHolder1_UpdatePanel1">

    <div id="ContentPlaceHolder1_pnlddl">

      <div class="col-md-3">
        <div class="fancy-select"><select name="ctl00$ContentPlaceHolder1$ddlUnvan" onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ddlUnvan\',\'\')', 0)" id="ContentPlaceHolder1_ddlUnvan" class="fancy-select form-control fancified" style="width: 1px; height: 1px; display: block; position: absolute; top: 0px; left: 0px; opacity: 0;">
          <option selected="selected" value="0">Ünvan Seçiniz</option>
          <option value="OKUL MÜDÜRÜ">OKUL MÜDÜRÜ</option>
          <option value="MÜDÜR YARDIMCISI">MÜDÜR YARDIMCISI</option>
          <option value="SINIF ÖĞRETMENİ">SINIF ÖĞRETMENİ</option>
          <option value="REHBER ÖĞRETMENİ">REHBER ÖĞRETMENİ</option>
          <option value="ÖZEL EĞİTİM ÖĞRETMENİ">ÖZEL EĞİTİM ÖĞRETMENİ</option>
          <option value="TÜRKÇE ÖĞRETMENİ">TÜRKÇE ÖĞRETMENİ</option>
          <option value="MATEMATİK ÖĞRETMENİ">MATEMATİK ÖĞRETMENİ</option>
          <option value="FEN BİLİMLERİ ÖĞRETMENİ">FEN BİLİMLERİ ÖĞRETMENİ</option>
          <option value="SOSYAL BİLGİLER ÖĞRETMENİ">SOSYAL BİLGİLER ÖĞRETMENİ</option>
          <option value="MÜZİK ÖĞRETMENİ">MÜZİK ÖĞRETMENİ</option>
          <option value="DİĞER">DİĞER</option>

        </select><div class="trigger">Ünvan Seçiniz</div><ul class="options"><li data-raw-value="0" class="selected">Ünvan Seçiniz</li><li data-raw-value="OKUL MÜDÜRÜ">OKUL MÜDÜRÜ</li><li data-raw-value="MÜDÜR YARDIMCISI">MÜDÜR YARDIMCISI</li><li data-raw-value="SINIF ÖĞRETMENİ">SINIF ÖĞRETMENİ</li><li data-raw-value="REHBER ÖĞRETMENİ">REHBER ÖĞRETMENİ</li><li data-raw-value="ÖZEL EĞİTİM ÖĞRETMENİ">ÖZEL EĞİTİM ÖĞRETMENİ</li><li data-raw-value="TÜRKÇE ÖĞRETMENİ">TÜRKÇE ÖĞRETMENİ</li><li data-raw-value="MATEMATİK ÖĞRETMENİ">MATEMATİK ÖĞRETMENİ</li><li data-raw-value="FEN BİLİMLERİ ÖĞRETMENİ">FEN BİLİMLERİ ÖĞRETMENİ</li><li data-raw-value="SOSYAL BİLGİLER ÖĞRETMENİ">SOSYAL BİLGİLER ÖĞRETMENİ</li><li data-raw-value="MÜZİK ÖĞRETMENİ">MÜZİK ÖĞRETMENİ</li><li data-raw-value="DİĞER">DİĞER</li></ul></div>
        <span id="ContentPlaceHolder1_lblUnvan" style="color:Red;font-weight:bold;"></span>
      </div>
      
    </div>
    
    
  </div>

  <label class="col-md-2 control-label">Telefon:</label>
  <div class="col-md-3">
    <input name="ctl00$ContentPlaceHolder1$txtTelefon" type="text" maxlength="16" id="ContentPlaceHolder1_txtTelefon" class="form-control" placeholder="Telefon">
    <span id="ContentPlaceHolder1_RegularExpressionValidator2" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
  </div>
</div>
</div>

<!-- End .form-group 4 -->


<!-- Start .form-group 5 -->
<div class="form-group">
 <div class="row">
  <label class="col-md-2 control-label" for="">Kayıt Tarihi:</label>
  <div class="col-md-3">
    <div class=" input-group">
      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

      <input name="ctl00$ContentPlaceHolder1$txtKayit" type="text" value="18.09.2017" maxlength="10" id="ContentPlaceHolder1_txtKayit" class="form-control" placeholder="gg.AA.yyyy">

    </div>
  </div>

  <label class="col-md-2 control-label" for="">Ayrılış Tarihi:</label>
  <div class="col-md-3">
   <div class=" input-group">
     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>


     <input name="ctl00$ContentPlaceHolder1$txtAyrilis" type="text" maxlength="10" id="ContentPlaceHolder1_txtAyrilis" class="form-control" placeholder="gg.AA.yyyy">

   </div>
 </div>
</div>
</div>
<!-- End .form-group 5 -->

</div>
</div>
  <i class="renk">*</i> ile işaretli alanların doldurulması zorunludur!
  <br>
  <span id="ContentPlaceHolder1_lblHataKontrol" style="color:Red;font-weight:bold;"></span>
</div>
<!-- End .panel -->
<a id="ContentPlaceHolder1_btnKaydet" class="btn btn-success mr5 mb10" title="Kaydet" href='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$ContentPlaceHolder1$btnKaydet", "", true, "", "", false, true))'><i class="glyphicon glyphicon-ok">&nbsp;<span class="spanfont">Kaydet</span></i></a>
<a id="ContentPlaceHolder1_btnIptal" class="btn btn-success mr5 mb10" title="İptal" href='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$ContentPlaceHolder1$btnIptal", "", true, "", "", false, true))'><i class="glyphicon glyphicon-remove">&nbsp;<span class="spanfont">İptal</span>&nbsp;</i></a>
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
