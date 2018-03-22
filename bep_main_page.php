<!-- PHP CHECKING INPUTS -->
<?php 
require_once "connectDB.php";
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



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


  <!-- Mervenin ekledikleri-->
  <!-- Import google fonts - Heading first/ text second -->
  <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
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
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  	<!-- AdminLTE App -->
  	<script src="dist/js/adminlte.min.js"></script>
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>

    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>td{
      border: 1px solid #51bcdc;
      font-size:18px 
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">

 <div class="wrapper">
  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'personelPageSidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>Bireysel Eğitim Planı</h1>

  </section>
  <!-- Formu yazacağımız ikinci alan -->
  <section class="content" >


    <!-- FORM -->
    <form id="BEPForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

     <!--Content wrapper-->
     <div class="contentwrapper" > 

      <!--ContentPlaceHolder1_pnlgenel-->
      <div id="ContentPlaceHolder1_pnlgenel">

       <!-- Start .panel-1 -->
       <div class="col-lg-16 " >
        <div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">


         <div class="panel-heading">
          <h4 class="panel-title">Bireysel Eğitim Planı Oluştur</h4>
        </div>
        <div class="panel-body pt0 pb0">
          <div class="form-horizontal group-border stripped">

           <!-- form-group 1 -->
           <div class="form-group">
            <div class="row">

             <label class="col-md-2 control-label">Adı:</label>
             <div class="col-md-3">
              <input name="studentName" type="text" maxlength="64" class="form-control" readonly 
              <?php 
              $id = $_GET['id'];
              $result = mysqli_query($conn, "SELECT name FROM `student` WHERE `student_PK`=$id");
              $array = mysqli_fetch_array($result, MYSQL_ASSOC);
              echo "value=".$array['name']."";
              ?>
              > 
            </div>

            <label class="col-md-2 control-label">Soyadı:</label>
            <div class="col-md-3">
              <input name="studentSurname" type="text" maxlength="64" class="form-control" readonly
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
        <!-- form-group 1 END-->

        <!-- form-group 2 -->
        <div class="form-group">
          <div class="row">

           <label class="col-md-2 control-label">T.C. No:</label>
           <div class="col-md-3">
            <input name="TCNumber" type="text" maxlength="11" class="form-control" readonly
            <?php 
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT tc_no FROM `student` WHERE `student_PK`=$id");
            $array = mysqli_fetch_array($result, MYSQL_ASSOC);
            echo "value=".$array['tc_no']."";
            ?>
            >
          </div> 

          <label class="col-md-2 control-label">Sınıfı:</label>
          <div class="col-md-3">
            <input name="studentClass" type="text" maxlength="8" class="form-control" readonly
            <?php 
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT class FROM `student` WHERE `student_PK`=$id");
            $array = mysqli_fetch_array($result, MYSQL_ASSOC);
            echo "value=".$array['class']."";
            ?>
            >
          </div>

        </div>
      </div>
      <!-- form-group 2 END-->

      <!-- form-group 3 -->
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
           $result = mysqli_query($conn, "SELECT registration_date FROM `student` WHERE `student_PK`=$id");
           $array = mysqli_fetch_array($result, MYSQL_ASSOC);
           echo "value=".$array['registration_date']."";
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
         $result = mysqli_query($conn, "SELECT deletion_date FROM `student` WHERE `student_PK`=$id");
         $array = mysqli_fetch_array($result, MYSQL_ASSOC);
         echo "value=".$array['deletion_date']."";
         ?>
         >
       </div>
     </div>

   </div>
 </div>
 <!-- form-group 3 END-->      

 <!--form-group 4 -->
 <div class="form-group">
  <div class="row">
   <label class="col-md-2 control-label" for="">Bep Komisyonu:</label>
   <div class="col-md-3">
    <div class=" input-group">
     <select id="framework1" name="framework1[]" multiple class="form-control" >
      <?php
      $result = mysqli_query($conn, "SELECT `name`, `surname` FROM `personel`");
      while ($array = mysqli_fetch_array($result, MYSQL_ASSOC)) {
       echo "<option value=".$array['name']." ".$array['surname'] .">".$array['name']." ".$array['surname'] ."</option>" ;
     }   
     ?>
   </select>
 </div>
</div>
</div>
</div>
<!-- form-group 4 END-->

<!--form-group 5 -->
<div class="form-group">
  <div class="row">

   <label class="col-md-2 control-label" for="">Değerlendirme Tarihi:</label>
   <div class="col-md-3">
    <div class=" input-group" >
     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
     <input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>
   </div>
 </div>

</div>
</div>
<!-- form-group 5 END-->

<!--form-group 6 -->
<div class="form-group">
  <div class="row">

   <label class="col-md-2 control-label" for="">Dersler</label>
   <div class="col-md-3">
    <div class=" input-group">



     <select id="framework" name="framework[]" multiple class="form-control" >
      <?php
      $result = mysqli_query($conn, "SELECT `lesson_name` FROM `lessons`");
      while ($array = mysqli_fetch_array($result, MYSQL_ASSOC)) {
       echo "<option value=".$array['lesson_name'].">".$array['lesson_name']."</option>" ;
     }   
     ?>
   </select>
 </div>
</div>

</div>
</div>
<!-- form-group 6 END-->

</div>
</div>

<i class="renk">*</i> ile işaretli alanların doldurulması zorunludur!
</div>
<input type="submit" name="submit" id="sub" value="BEP Oluştur" class="btn btn-success mr5 mb10">

</div>
<!-- .panel-1 END-->

<!-- Start .panel-2 -->
<div class="col-lg-16 " >
  <div class="panel panel-default  toggle panelMove panelRefresh" id="supr2">
   <div class="panel-body">
    <div class="col-lg-16">
     <div class="tabs mb20">

      <ul id="myTab" class="nav nav-tabs">
       <li class="active">
        <a href="#home1" data-toggle="tab" aria-expanded="true"><b>BİREYSEL EĞİTİM DEĞERLENDİRMELERİ</b></a>
      </li>
      <li class="">
        <a href="#profile1" data-toggle="tab" aria-expanded="false"><b>EĞİTSEL PERFORMANSLAR</b></a>
      </li>
    </ul>

    <div id="myTabContent2" class="tab-content">

     <!-- home1  START-->
     <div class="tab-pane fade active in" id="home1">
      <div class="panel-group" id="accordion">
       <!-- panel 1.grup START-->
       <div class="row">
        <div class="col-md-12">
         <button class="accordion2" data-toggle="collapse" data-target="#demo" data-parent="#accordion">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; OKUMA YAZMAqeqe</button>
         <div id="demo" class="collapse">
          <div class="panel panel-default">
           <div class="panel-body">

            <table class="table table-striped table-hover table-bordered">
             <thead class="blue-grey lighten-4">
              <tr>
               <th>KAZANIMLAR</th>
               <th>BİLDİRİMLER</th>
               <th>YÖNTEM/TEKNİK</th>
               <th>ARAÇ/GEREÇ</th>
               <th>EĞİTİM BAŞLANGIÇ</th>
               <th>EĞİTİM EĞİTİM BİTİŞ</th>
             </tr>
           </thead>
           <tbody>
            <tr scope="row1">
             <td rowspan="4">Rakamları okur ve yazar.</td>
             <td>Rakamları okur ve yazar.</td>
             <td rowspan="4">$50</td>
             <td rowspan="4">$50</td>
             <td rowspan="4">$50</td>
             <td rowspan="4">$50</td>
           </tr>
           <tr scope="row2">
             <td>Sayı kavramını bili.</td>
           </tr>
           <tr scope="row3">
             <td>Ritmik sayar.</td>
           </tr>
         </tbody>
       </table>

     </div>
   </div>
 </div>
</div>
</div>
<!-- panel 1.grup END-->

<!-- panel 2.grup START-->
<div class="row">
  <div class="col-md-12">
   <button data-toggle="collapse" data-target="#demo1" data-parent="#accordion">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; OKUMA YAZMAqeqe</button>
   <div id="demo1" class="collapse">
    <div class="panel panel-default">
     <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.
    </div>
  </div>
</div>
</div>
</div>
<!-- panel 2.grup END-->

</div>

</div>
<!-- home1  END-->

<!-- profile1  START-->
<div class="tab-pane fade" id="profile1">
  <div class="panel-group" id="accordion">
   <!-- panel 1.grup START-->
   <div class="row">
    <div class="col-md-12">
     <button data-toggle="collapse" data-target="#demo2" data-parent="#accordion">ÖZEL ÖĞRENME GÜÇLÜĞÜ DESTEK EĞİTİM PROGRAMI &gt;&gt; matematik</button>
     <div id="demo2" class="collapse">
      <div class="panel panel-default">
       <div class="panel-body">

        <table class="table table-striped table-hover table-bordered">
         <thead>
          <tr>
           <th>KAZANIMLAR</th>
         </tr>
       </thead>
       <tbody>
        <tr scope="row1">
         <td>Rakamları okur ve yazar.</td>
       </tr>
       <tr scope="row2">
         <td>Sayı kavramını bilir.</td>
       </tr>
       <tr scope="row3">
         <td>Ritmik sayar.</td>
       </tr>
     </tbody>
   </table>

 </div>
</div>
</div>
</div>
</div>
<!-- panel 1.grup END-->
</div>
</div>
<!-- profile1  END-->
</div>

</div>
</div>
</div>
</div>
</div>
<!-- .panel-2 END-->
<a class="btn btn-success mr5 mb10" title="Yazdır"><i class="glyphicon glyphicon-print">&nbsp;<span class="spanfont">Yazdır</span>&nbsp;</i></a>
<a class="btn btn-success mr5 mb10" title="Sil"><i class="glyphicon glyphicon-remove">&nbsp;<span class="spanfont">Sil</span>&nbsp;</i></a>
</div>
<!--ContentPlaceHolder1_pnlgenel END-->

<div class="control-sidebar-bg"></div>
</div>
<!--Content wrapper END-->

</form>
<!-- FORM END-->

</section><!-- Formu yazacağımız ikinci alan son -->

</div><!-- class: content-wrapper son -->
</div> <!-- class: wrapper son -->



<?php 
session_unset(); ?>
</body>
</html>
<!-- Seymanın Ekledikleri BepKomısyonu multi-select-input START-->
<script>
 $(document).ready(function(){
  $('#framework1').multiselect({
   nonSelectedText: 'Ders Seçiniz',
   enableFiltering: true,
   enableCaseInsensitiveFiltering: true,
   buttonWidth:'400px'
 });

  $('#BEPForm').on('submit', function(event){
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
<!-- Seymanın Ekledikleri END-->

<!-- Seymanın Ekledikleri Dersler multi-select-input START-->
<script>
 $(document).ready(function(){
  $('#framework').multiselect({
   nonSelectedText: 'Ders Seçiniz',
   enableFiltering: true,
   enableCaseInsensitiveFiltering: true,
   buttonWidth:'400px'
 });

  $('#BEPForm').on('submit', function(event){
   event.preventDefault();
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#framework option:selected').each(function(){
      $(this).prop('selected', false);
    });
     $('#framework').multiselect('refresh');
     alert(data);
   }
 });
 });


});
</script>
<!-- Seymanın Ekledikleri END-->

<!--Mervenin Ekledikleri Kaba değerlendirme tablo animasyonu js START -->
<script>
  var acc = document.getElementsByClassName("accordion_mt");
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
  <!--Mervenin Ekledikleri Kaba değerlendirme tablo animasyonu js END -->