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
              <h3 class="box-title"><b>ÖĞRENCİ BİLGİLERİ</b></h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 form-group">
                    <div class="box box-primary">
                      <div id="studentInfo" class="box-body box-profile">
                        <?php 
                        $sql = "SELECT * FROM student WHERE student_PK = $studentID";
                        $row = $conn->query($sql,PDO::FETCH_ASSOC)->fetch();
                        $photo = $row['photo'];
                        if(empty($photo)){
                          if($row['gender_FK'] == 2)
                            $photo = "../dist/img/avatar5.png";
                          if($row['gender_FK'] == 1)
                            $photo = "../dist/img/avatar2.png";
                        }

                        $output = "";
                        $output .= "<img id = 'ogrenciPhoto' class='profile-user-img img-responsive img-circle' src='".$photo."' alt='User profile picture'>";
                        $output .= "<h3 class='profile-username text-center'>".$row['name']." ".$row['surname']."</h3>
                        <ul class='list-group list-group-unbordered'>
                        <li class='list-group-item'>";
                        $output .= "<b>TC</b> <a class='pull-right'>".$row['tc_no']."</a></li>";
                        $output .= "<li class='list-group-item'>
                        <b>Doğum Tarihi</b> <a class='pull-right'>".$row['birthday']."</a></li>";
                        $output .= "<li class='list-group-item'>
                        <b>Sınıf</b> <a class='pull-right'>".$row['class']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Rapor Numarası</b> <a class='pull-right'>".$row['rapor_no']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Kayıt Tarihi</b> <a class='pull-right'>".$row['registration_date']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Silinme Tarihi</b> <a class='pull-right'>".$row['deletion_date']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Dönem Başlangıç Tarihi</b> <a class='pull-right'>".$row['term_start_date']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Dönem Bitiş Tarihi</b> <a class='pull-right'>".$row['term_finish_date']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Rehberlik Merkezi</b> <a class='pull-right'>".$row['rehberlik_merkezi']."</a>
                        </li>";
                        $output .= "<li class='list-group-item'>
                        <b>Tanılar</b><a class='pull-right'></a>
                        </li>";
                        $retval2 = $conn->query("SELECT diagnosis from student_diagnosis SD,educational_diagnosis ED where SD.diagnosis_FK = ED.diagnosis_PK AND SD.student_FK = ".$studentID, PDO::FETCH_ASSOC);
                        $i =1;
                        foreach ($retval2 as $key => $value) {
                          $output .= "<li class='list-group-item'>
                          <b>".$i."</b><a class='pull-right'>".$value['diagnosis']."</a>
                          </li>";
                          $i++;
                        }
                        echo $output;
                        ?>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- box-body START-->
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