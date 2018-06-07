<?php 

session_start();
if($_SESSION['access_type'] == 'parent'){
  require_once "../connectDB.php";
  $parentID = $_SESSION['parentPK'];
  $sql = "SELECT student_FK FROM parent WHERE parent_PK = '$parentID'";
  $retval = $conn ->query($sql,PDO::FETCH_ASSOC)->fetch();
  $studentID = $retval['student_FK'];

  $sql = "SELECT note,name,surname,tarih FROM notes N,personel P WHERE student_FK = '$studentID' AND N.personel_FK = P.personel_PK";
  $result = $conn ->query($sql,PDO::FETCH_ASSOC);

  ?>
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
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/myCss.css">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
     <!-- Left side column. contains the logo and sidebar -->
     <?php require_once 'header.php'; ?>
     <!-- Left side column. contains the logo and sidebar -->
     <?php require_once 'parentPageSidebar.php'; ?>

     <div class="content-wrapper">
       <section class="content">
        <div class="row">
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-ios-folder"></i>
              <h3 class="box-title"><b>VELİ BİLGİLERİ</b></h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 form-group">
                  <div class="box box-primary">
                    <div id="veliInfo" class="box-body box-profile">  
                     <?php 
                     $output = "";
                     $sql = "SELECT * FROM parent where student_FK = '$studentID'";
                     $result = $conn->query($sql,PDO::FETCH_ASSOC)->fetch();   
                     $output = "
                     <ul class='list-group list-group-unbordered'>
                     <li class='list-group-item'>
                     <b>İsim</b> <a class='pull-right'>".$result['name']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>Soyisim</b> <a class='pull-right'>".$result['surname']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>TC NO</b> <a class='pull-right'>".$result['tc_no']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>Telefon</b> <a class='pull-right'>".$result['tel_no']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>Sabit Telefon</b> <a class='pull-right'>".$result['sabit_tel']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>Adres</b> <a class='pull-right'>".$result['adress']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>İş Adresi</b> <a  class='pull-right'>".$result['work_adress']."</a>
                     </li>
                     <li class='list-group-item'>
                     <b>E-Posta Adresi</b> <a  class='pull-right'>".$result['email_adress']."</a>
                     </li>
                     </ul>"; 
                     echo $output;?> 
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
   </div>
 </div>



</body>
</html>

<?php 
}
else{
 header("location: ../index.php");
}

unset($_SESSION['successErr']);
$conn = null;
exit();
?>