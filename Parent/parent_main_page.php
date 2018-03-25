<!DOCTYPE html>
<html>
<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Albatros</title>
 <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'parentPageSidebar.php'; ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li><a href="#">Öğrenci Bilgileri</a></li>
                <li class="active">Merve Tunçel</li>
              </ol>
            </small>
          </h1>
        </section>

        <!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <!-- /.box -->
                  <div class="box" style="height: 600px">
                    <div class="box-header">
                      <h3 class="box-title">Merve Tunçel - Bilgileri</h3>
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

                              <h3 class="profile-username text-center">Merve Tunçel</h3>
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
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Calendar :)) -->
  <script src="../bower_components\fullcalendar\dist\fullcalendar.min.js"></script>
  <script src="../bower_components\fullcalendar\dist\fullcalendar.js"></script>
  <script src="../bower_components\moment\moment.js"></script>
  <!-- Morris.js charts -->
  <script src="../bower_components/raphael/raphael.min.js"></script>
  <script src="../bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../bower_components/moment/min/moment.min.js"></script>
  <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>


  


</body>
</html>
