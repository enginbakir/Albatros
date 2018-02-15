
<?php 
session_start();

$conn = mysql_connect('localhost','root','12345678');
$db = mysql_select_db('albatros');


$nameErr = $surnameErr = $genderErr = $TCNumberErr = $studentPhoneNumberErr = "";
$studentName = $studentSurname = $gender = $TCNumber = $parentPhoneNumber = $class = $educationalDiagnosis = "";
$bool = true;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if (empty($_POST["studentName"])) {
    $_SESSION["nameErr"] = "Name is required";
    $bool = false;
  } 
  else{
    $studentName = test_input($_POST["studentName"]);
      // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$studentName)) {
      $_SESSION["nameErr"] = "Only letters and white space allowed"; 
      $bool = false;
    }
  }

  if(empty($_POST['studentSurname'])){
    $_SESSION["surNameErr"] = "Surname is Required";
    $bool = false;
  }
  else{
    $studentSurname = test_input($_POST['studentSurname']);
    if(!preg_match("/^[a-zA-Z]*$/",$studentSurname)){
      $_SESSION["surNameErr"] = "Only letters and while space allowed";
      $bool = false;
    }
  }
  if(empty($_POST["TCNumber"]))
    $_SESSION["TCNumberErr"] = "TC Number is Required";
  else{
    $TCNumber = test_input($_POST['TCNumber']);
    /// regular exprestion will be here ///
  }
  if($bool == true)
    saveStudent();
  else{   
   // echo "Failed to call saveStudent()";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



function saveStudent(){
  global $TCNumber,$studentName,$studentSurname,$donemBaslangicTarihi;

  if(mysql_query("INSERT INTO student (tc_no,name,surname,term_start_date) VALUES ('$TCNumber','$studentName','$studentSurname','$donemBaslangicTarihi')")){
    echo "Successfully Inserted";
  }
  else
    echo "Insertion Failed";
}


?>

<!-- PHP CHECKING INPUTS -->

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



<style>
.error {color: #FF0000;}

</style>


</head>
<body class="hold-transition skin-blue sidebar-mini">






  <div class="wrapper">

    <?php include 'header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Yeni Öğrenci Ekle
          <small>...........</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
          <li><a href="#">Öğrenci</a></li>
          <li class="active">Ekle</li>
        </ol>
      </section>

      <!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">

                <!-- FORM -->

                <form id="addStudentForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                  <!-- FORM -->

                  <div class="contentwrapper">

                    <!--Content wrapper-->

                    <div id="ContentPlaceHolder1_pnlgenel">

                     <div class="col-lg-16 ">
                      <p>engin bakır</p>

                      <div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">
                        <!-- Start .panel -->
                        <div class="panel-heading">

                          <h4 class="panel-title">Öğrenci Bilgileri</h4>
                        </div>

                        <div class="panel-body pt0 pb0">

                          <div class="form-horizontal group-border stripped">

                            <!-- Start .form-group 1 -->
                            <div class="form-group">

                              <div class="row">
                                <label class="col-md-2 control-label" for="">Dönem Başlangıç Tarihi:</label>
                                <div class="col-md-3">

                                  <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
                                    <!-- <input name="startDate" type="text" value="18.09.2017" maxlength="10" id="ContentPlaceHolder1_txtBasTarihi" class="form-control" placeholder="gg.AA.yyyy"> -->
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="donemBaslangicTarihi" class="form-control" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" />



                                  </div>

                                </div>
                                <label class="col-md-2 control-label" for="">Dönem Bitiş Tarihi:</label>
                                <div class="col-md-3">

                                 <div class="input-group">
                                 <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                   <input name="endDate" type="text" value="08.06.2018" maxlength="10" id="ContentPlaceHolder1_txtBitisTarihi" class="form-control " placeholder="gg.AA.yyyy"> -->
                                   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                   <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>

                                 </div>

                               </div>
                             </div>

                           </div>
                           <!-- End .form-group 1 -->

                           <!-- Start .form-group 2 -->
                           <div class="form-group">

                            <div class="row">

                              <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Adı:</label>

                              <div class="col-md-3">
                                <input name="studentName" type="text" maxlength="64" id="ContentPlaceHolder1_txtAdi" class="form-control" placeholder="Öğrenci Adı">
                                <span class="error">* <?php echo $_SESSION["nameErr"];?></span>
                                <span id="ContentPlaceHolder1_lblAdi" style="color:Red;font-weight:bold;"></span>
                              </div>

                              <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Soyadı:</label>
                              <div class="col-md-3">
                                <input name="studentSurname" type="text" maxlength="64" id="ContentPlaceHolder1_txtSoyadi" class="form-control" placeholder="Öğrenci Soyadı">
                                <span class="error">* <?php echo $_SESSION["surNameErr"];?></span>
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
                                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male                           
                                <div class="fancy-select">

                                 <select name="gender" id="ContentPlaceHolder1_ddlCinsiyet" class="fancy-select form-control fancified" style="width: 1px; height: 1px; display: block; position: absolute; top: 0px; left: 0px; opacity: 0;">
                                  <option value="Erkek">Kız</option>
                                  <option value="Kız">Kız</option> 

                                </select>
                                <div class="trigger">Erkek</div>
                                <ul class="options">
                                  <li data-raw-value="Erkek" class="selected">Erkek</li>
                                  <li data-raw-value="Kız">Kız</li>
                                </ul>
                              </div>

                            </div>
                            <label class="col-md-2 control-label">T.C. No:</label>
                            <div class="col-md-3">

                              <input name="TCNumber" type="text" maxlength="11" id="ContentPlaceHolder1_txtTC" class="form-control" placeholder="T.C. Kimlik No">
                              <span class="error">* <?php echo $_SESSION["TCNumberErr"];?></span>
                              <!-- <span id="ContentPlaceHolder1_RegularExpressionValidator1" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span> -->
                              <span id="ContentPlaceHolder1_lblTC" style="color:Red;font-weight:bold;"></span>
                            </div>                          
                          </div>
                        </div>

                        <!-- End .form-group 3 -->

                        <!-- Start .form-group 4 -->
                        <div class="form-group">
                          <div class="row">
                            <label class="col-md-2 control-label" for="">Doğum Tarihi:</label>
                            <div class="col-md-3">
                             <div class=" input-group">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                               <!-- <input name="birthDay" type="text" maxlength="10" id="ContentPlaceHolder1_txtDogumTarihi" class="form-control" placeholder="gg.AA.yyyy">-->
                               <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>
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

                      <!-- Start .form-group 4 -->
                      <div class="form-group">
                        <div class="row">
                         <label class="col-md-2 control-label">Sınıfı:</label>
                         <div class="col-md-3">

                           <input name="studentClass" type="text" maxlength="8" id="ContentPlaceHolder1_txtSinif" class="form-control" placeholder="Sınıfı">

                         </div>
                         <label class="col-md-2 control-label">Rapor No:</label>
                         <div class="col-md-3">
                           <input name="studentRapor" type="text" maxlength="16" id="ContentPlaceHolder1_txtRapor" class="form-control" placeholder="Rapor No">

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

                            <input name="registratinDate" type="text" value="12-9-2017"  maxlength="10" id="ContentPlaceHolder1_txtKayit" class="form-control" placeholder="gg.AA.yyyy">

                          </div> 
                        </div>
                      <!--
                        <label class="col-md-2 control-label" for="">Ayrılış Tarihi:</label>
                        <div class="col-md-3">
                            <div class=" input-group">
                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span>


                           <input name="ctl00$ContentPlaceHolder1$txtAyrilis" type="text" maxlength="10" id="ContentPlaceHolder1_txtAyrilis" class="form-control" placeholder="gg.AA.yyyy">

                         </div> 
                       </div>  -->                      
                     </div>
                   </div>
                   <!-- End .form-group 5 -->

                   <!-- Start .form-group 6 -->
                   <div class="form-group">
                    <label class="col-md-2 control-label" for="">Reh. Araş. Merkezi:</label>
                    <div class="col-md-4">

                      <input name="rehberlikMerkezi" type="text" maxlength="64" id="ContentPlaceHolder1_txtMerkezi" class="form-control" placeholder="Rehberlik Araştırma Merkezi">

                    </div>
                    <label class="col-md-2 control-label"><i class="renk">*&nbsp;</i>Eğitsel Tanı:</label>
                    <div class="col-md-4">
                      <div class="select2-container select2-container-multi form-control select2" id="s2id_ContentPlaceHolder1_ddlTani">
                        <ul class="select2-choices">  
                          <li class="select2-search-field">    
                            <label for="s2id_autogen1" class="select2-offscreen"></label>    
                            <input name="educationalDiagnosis" type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" id="s2id_autogen1" style="width: 110%;" placeholder="Eğitsel Tanı">  
                          </li>
                        </ul>
                        <div class="select2-drop select2-drop-multi select2-display-none">   
                          <ul class="select2-results">   
                            <li class="select2-no-results">Başka Veri Bulunamadı</li>
                          </ul>
                        </div>
                      </div>
                    <!--<select size="4" name="ctl00$ContentPlaceHolder1$ddlTani" multiple="multiple" id="ContentPlaceHolder1_ddlTani" class="form-control select2" tabindex="-1" style="display: none;">
                      <option value="Hafif Düzey Zihinsel Yetersizlik">Hafif Düzey Zihinsel Yetersizlik</option>
                      <option value="Orta Düzey Zihinsel Yetersizlik (ODZY)">Orta Düzey Zihinsel Yetersizlik (ODZY)</option>
                      <option value="Ağır Düzey Zihinsel Yetersizlik (ADZY)">Ağır Düzey Zihinsel Yetersizlik (ADZY)</option>
                      <option value="Çok Ağır Düzey Zihinsel Yetersizlik (CADZY)">Çok Ağır Düzey Zihinsel Yetersizlik (CADZY)</option>
                      <option value="Bedensel Yetersizlik">Bedensel Yetersizlik</option>
                      <option value="Görme Yetersizliği">Görme Yetersizliği</option>
                      <option value="Duygusal Davranış Bozukluğu (DDB)">Duygusal Davranış Bozukluğu (DDB)</option>
                      <option value="Yaygın Gelişimsel Bozukluk (OTİZM)">Yaygın Gelişimsel Bozukluk (OTİZM)</option>
                      <option value="Özel Öğrenme Güçlüğü (ÖÖG)">Özel Öğrenme Güçlüğü (ÖÖG)</option>
                      <option value="Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)">Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)</option>
                      <option value="Dil Konuşma Güçlüğü (DKG)">Dil Konuşma Güçlüğü (DKG)</option>
                      <option value="Üstün Yetenekli Birey (ÜYB)">Üstün Yetenekli Birey (ÜYB)</option>
                      <option value="İşitme Yetersizliği">İşitme Yetersizliği</option>
                      <option value="Normal">Normal</option>

                    </select>-->
                    <span id="ContentPlaceHolder1_lblTani" style="color:Red;font-weight:bold;"></span>
                  </div>
                </div>
                <!-- End .form-group 6 -->

              </div>
            </div>
          </div>
          <!-- End .panel -->

        </div>
      </div>
      <!-- End Of ContentPlaceHolder1_pnlgenel -->
    </div>

    <!-- End Of ContentWrapper -->

    <div class="col-lg-16">
     <div class="panel panel-default toggle panelMove panelRefresh" id="supr1">
      <!-- Start .panel -->
      <div class="panel-heading">
        <h4 class="panel-title">Veli Bilgileri</h4>
      </div>

      <div class="panel-body pt0 pb0">
        <div class="form-horizontal group-border stripped">

          <div class="form-group">
           <div class="row">
            <label class="col-md-2 control-label" for=""><i class="renk">*&nbsp;</i>Veli Adı:</label>
            <div class="col-md-3">
             <input name="ctl00$ContentPlaceHolder1$txtVeliAdi" type="text" maxlength="64" id="ContentPlaceHolder1_txtVeliAdi" class="form-control" placeholder="Velinin Adı">
             <span id="ContentPlaceHolder1_lblVeliAdi" style="color:Red;font-weight:bold;"></span>
           </div>

           <label class="col-md-2 control-label" for=""><i class="renk">*&nbsp;</i>Veli Soyadı:</label>
           <div class="col-md-3">
            <input name="ctl00$ContentPlaceHolder1$txtVeliSoyadi" type="text" maxlength="64" id="ContentPlaceHolder1_txtVeliSoyadi" class="form-control" placeholder="Velinin Soyadı">
            <span id="ContentPlaceHolder1_lblVeliSoyadi" style="color:Red;font-weight:bold;"></span>
          </div>
        </div>
      </div>
      <!-- End .form-group  -->

      <div class="form-group">
       <div class="row">
        <label class="col-md-2 control-label">T.C. No:</label>
        <div class="col-md-3">

         <input name="ctl00$ContentPlaceHolder1$txtTCVeli" type="text" maxlength="11" id="ContentPlaceHolder1_txtTCVeli" class="form-control" placeholder="TC Kimlik No">
         <span id="ContentPlaceHolder1_RegularExpressionValidator3" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
       </div>
       <label class="col-md-2 control-label" for="">Yakınlık Derecesi:</label>
       <div class="col-md-3">
        <div class="fancy-select"><select name="ctl00$ContentPlaceHolder1$ddlYakinlik" id="ContentPlaceHolder1_ddlYakinlik" class="fancy-select form-control fancified" style="width: 1px; height: 1px; display: block; position: absolute; top: 0px; left: 0px; opacity: 0;">
          <option value="Anne">Anne</option>
          <option value="Baba">Baba</option>
          <option value="Diğer">Diğer</option>

        </select><div class="trigger">Anne</div><ul class="options"><li data-raw-value="Anne" class="selected">Anne</li><li data-raw-value="Baba">Baba</li><li data-raw-value="Diğer">Diğer</li></ul></div>

      </div>

    </div>
  </div>
  <!-- End .form-group  -->

  <div class="form-group">
    <div class="row">

      <label class="col-md-2 control-label">Sabit Telefon:</label>
      <div class="col-md-3">

        <input name="ctl00$ContentPlaceHolder1$txtSabitTel" type="text" maxlength="16" id="ContentPlaceHolder1_txtSabitTel" class="form-control" placeholder="Sabit Telefon">
        <span id="ContentPlaceHolder1_RegularExpressionValidator4" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
      </div>
      <label class="col-md-2 control-label">Cep Telefonu:</label>
      <div class="col-md-3">

        <input name="ctl00$ContentPlaceHolder1$txtCepTel" type="text" maxlength="16" id="ContentPlaceHolder1_txtCepTel" class="form-control" placeholder="Cep Telefonu">
        <span id="ContentPlaceHolder1_RegularExpressionValidator5" style="color:Red;font-weight:bold;visibility:hidden;">Lütfen Geçerli Bir Numara Giriniz</span>
      </div>

    </div>
  </div>

  <!-- End .form-group  -->
  <div class="form-group">
    <label class="col-md-2 control-label" for="">Ev Adresi:</label>
    <div class="col-md-8">

      <input name="ctl00$ContentPlaceHolder1$txtEvAdresi" type="text" maxlength="256" id="ContentPlaceHolder1_txtEvAdresi" class="form-control">

    </div>
  </div>
  <!-- End .form-group  -->
  <div class="form-group">
    <label class="col-md-2 control-label" for="">İş Adresi:</label>
    <div class=" col-md-8">

      <input name="ctl00$ContentPlaceHolder1$txtIsAdresi" type="text" maxlength="256" id="ContentPlaceHolder1_txtIsAdresi" class="form-control">

    </div>
  </div>
  <!-- End .form-group  -->
  <div class="form-group">
    <label class="col-md-2 control-label" for="">Açıklama:</label>
    <div class="col-md-8">
      <textarea name="ctl00$ContentPlaceHolder1$txtAciklama" rows="2" cols="20" id="ContentPlaceHolder1_txtAciklama" class="form-control"></textarea>


    </div>
  </div>
  <!-- End .form-group  -->

</div>


<!--<button type="submit" id="sub" class="btn btn-success mr5 mb10">Kaydet Button</button> -->
<input type="submit" id="sub" value="Kaydet" class="btn btn-success mr5 mb10">  

<h1><span id="result" style="color:blue"></span></h1>

</div>
<i class="renk">*</i> ile işaretli alanların doldurulması zorunludur!
<br>

<span id="ContentPlaceHolder1_lblHataKontrol" style="color:Red;font-weight:bold;"></span>
</div>

<p>engin bakır</p>
<!-- End of Panel -->

</div>
<!-- End of col-lg-16 -->

<!--<a id="ContentPlaceHolder1_btnKaydet" class="btn btn-success mr5 mb10" title="Kaydet" href='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$ContentPlaceHolder1$btnKaydet", "", true, "", "", false, true))'><i class="glyphicon glyphicon-ok">&nbsp;<span class="spanfont">Kaydet</span></i></a>
  <a id="ContentPlaceHolder1_btnIptal" class="btn btn-success mr5 mb10" title="İptal" href='javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions("ctl00$ContentPlaceHolder1$btnIptal", "", true, "", "", false, true))'><i class="glyphicon glyphicon-remove">&nbsp;<span class="spanfont">İptal</span>&nbsp;</i></a> -->

</form>





<!-- END OF FORM -->
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


<!--
<script type="text/javascript">

  $("#sub").click( function() {
  $.post( $("#addStudentForm").attr("action"), $("#addStudentForm :input").serializeArray(), function(info){ $("#result").html(info); } );

 // location.reload("9000");
    clearInput();
 });

 /* $("#addStudentForm").submit( function() {
    return false; 
  });*/

  function clearInput() {
    $("#addStudentForm :input").each( function() {
     $(this).val('');
   });
  };

</script>  -->

<?php 
session_unset(); ?>

</body>
</html>
