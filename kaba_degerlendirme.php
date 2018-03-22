<!-- PHP CHECKING INPUTS -->
<?php 
require_once "baglan.php";
?>

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

  <!-- seymanın ekledikleri multi-select-input -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- En son derlenmiş ve minimize edilmiş CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Opsiyonel tema -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <!-- En son derlenmiş ve minimize edilmiş JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--accordion için END-->

  <!-- seymanın ekledikleri son-->


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
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Kaba Değerlendirme Oluştur
          <!-- <small>...........</small> -->
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

                <form id="KABForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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

                           <!-- Start .form-group 1 -->
                           <div class="form-group">

                            <div class="row">


                              <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Adı:</label>
                              <div class="col-md-3">
                                <input name="studentName" type="text" maxlength="50" class="form-control" readonly 
                                <?php 
                                $id = $_GET['id'];
                                $result = mysqli_query($conn, "SELECT name FROM `student` WHERE `student_PK`=$id");
                                $array = mysqli_fetch_array($result, MYSQL_ASSOC); 
                                echo "value=".$array['name']."";
                                ?>
                                > 
                                <span style="color:Red;font-weight:bold;"></span>
                              </div>


                              <label class="col-md-2 control-label">Soyadı:</label>
                              <div class="col-md-3">
                                <input name="studentSurname" type="text" maxlength="50" class="form-control" readonly
                                <?php 
                                $id = $_GET['id'];
                                $result = mysqli_query($conn, "SELECT surname FROM `student` WHERE `student_PK`=$id");
                                $array = mysqli_fetch_array($result, MYSQL_ASSOC);
                                echo "value=".$array['surname']."";
                                ?>
                                >
                              </div>

                            </div>
                          </div>
                          <!-- End .form-group 1 -->

                          <!-- Start .form-group 2 -->
                          <div class="form-group">
                            <div class="row">

                              <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>T.C. No:</label>
                              <div class="col-md-3">
                                <input name="TCNumber" type="text" maxlength="11" class="form-control" readonly
                                <?php 
                                $id = $_GET['id'];
                                $result = mysqli_query($conn, "SELECT tc_no FROM `student` WHERE `student_PK`=$id");
                                $array = mysqli_fetch_array($result, MYSQL_ASSOC);
                                echo "value=".$array['tc_no']."";
                                ?>
                                >
                                <span style="color:Red;font-weight:bold;"></span>
                              </div> 

                              <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Sınıfı:</label>
                              <div class="col-md-3">
                                <input name="studentClass" type="text" maxlength="8" class="form-control" readonly
                                <?php 
                                $id = $_GET['id'];
                                $result = mysqli_query($conn, "SELECT class FROM `student` WHERE `student_PK`=$id");
                                $array = mysqli_fetch_array($result, MYSQL_ASSOC);
                                echo "value=".$array['class']."";
                                ?>
                                >
                                <span style="color:Red;font-weight:bold;"></span>
                              </div>


                            </div>
                          </div>
                          <!-- End .form-group 2 -->

                          <!-- Start .form-group 3 -->
                          <div class="form-group">
                            <div class="row">

                              <label class="col-md-2 control-label" for="">Eğitim Başlama Tarihi:</label>
                              <div class="col-md-3">
                                <div class=" input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                  <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"
                                  readonly
                                  <?php 
                                  $id = $_GET['id'];
                                  $result = mysqli_query($conn, "SELECT term_start_date FROM `student` WHERE `student_PK`=$id");
                                  $array = mysqli_fetch_array($result, MYSQL_ASSOC);
                                  echo "value=".$array['term_start_date']."";
                                  ?>
                                  >
                                </div>
                              </div>

                              <label class="col-md-2 control-label" for="">Eğitim Bitiş Tarihi:</label>
                              <div class="col-md-3">
                                <div class=" input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                  <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false" readonly
                                  <?php 
                                  $id = $_GET['id'];
                                  $result = mysqli_query($conn, "SELECT term_finish_date FROM `student` WHERE `student_PK`=$id");
                                  $array = mysqli_fetch_array($result, MYSQL_ASSOC);
                                  echo "value=".$array['term_finish_date']."";
                                  ?>
                                  >
                                </div>
                              </div>

                            </div>
                          </div>
                          <!-- End .form-group 3 -->

                          <!-- Start .form-group 4 -->
                          <div class="form-group">
                            <div class="row">
                              <label class="col-md-2 control-label" for="">Değerlendiren:</label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <select id="framework1" name="framework1[]" multiple class="form-control" >
                                    <option value="name1">Gülben ERGÜL</option>
                                    <option value="name2">Ferhat ÖZATAK</option>
                                    <option value="name3">F.Utku ÖZDEMİR</option>
                                    <option value="name4">Derya Hande AĞA</option>
                                    <option value="name5">Onur ACAR</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End .form-group 4 -->


                          <!-- Start .form-group 5 -->
                          <div class="form-group">
                            <div class="row">

                              <label class="col-md-2 control-label" ><i class="renk">*&nbsp;</i>Değerlendirme Tarihi:</label>
                              <div class="col-lg-3 col-md-4">
                                <div class=" input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                  <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>
                                </div>
                              </div>

                            </div>
                          </div>
                          <!-- End .form-group 5 -->

                          <!-- Start .form-group 6 -->
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-9" style="padding-left: 222px;">
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
                            <div class="col-lg-10 col-md-9" style="padding-left: 110px;">
                              <br><br>
                              <button type="button" class="col-lg-yeni16 col-md-3 btn btn-success mr5 mb10" onclick="myFunction()"><i class="fa fa-folder"></i>Değerlendir</button>
                              <br><br>                             
                            </div>
                          </div>
                          <!-- End .form-group 6 -->

                        </div>
                      </div>
                      <i class="renk">*</i> ile işaretli alanların doldurulması zorunludur!
                      <br>
                      <span style="color:Red;font-weight:bold;"></span>
                    </div>                  

                  </form>

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

                              <form action="addNewDegerlendirme.php" method="POST">
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
                                    $datam = mysqli_query($con,"SELECT * FROM deneme ORDER BY deneme_id ASC");

                                    while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
                                    <tr>
                                      <td>
                                        <?php echo $write['deneme_name']; ?>
                                      </td>
                                      <td>
                                        <input type="text" name="evet_d">
                                      </td> 
                                      <td>
                                        <input type="text" name="hayir_d">
                                      </td> 
                                      <td>
                                        <input type="text" name="aciklama_d" placeholder="Açıklama giriniz.">
                                      </td>  
                                    </tr>
                                    <?php } ?> 
                                  </tbody>
                                </table>
                              </form>

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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

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

  <!-- Multiselect animasyonu js si -->
  <script>
    $(document).ready(function(){
      $('#framework1').multiselect({
        nonSelectedText: 'Değerlendiren Seçiniz',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
      });

      $('#KABForm').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
          url:"insert.php",
          method:"POST",
          data:form_data,
          success:function(data)
          {
            $('#framework1 option:selected').each(function(){
              $(this).prop('selected', false);
            });
            $('#framework1').multiselect('refresh');
            alert(data);
          }
        });
      });


    });
  </script>

</body>
</html>
