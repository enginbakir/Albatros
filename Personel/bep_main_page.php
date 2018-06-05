<!-- PHP CHECKING INPUTS -->
<?php 
session_start();

if($_SESSION['access_type'] == "personel"){ 

  require_once "../connectDB.php";
  $studentID = $_GET['id'];
  $access_id = $_SESSION['access_id'];

  ?>

  <!DOCTYPE html>
  <html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Albatros</title>
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
    <link rel="stylesheet" href="../dist/css/accordion.css"> 
    <!-- seymanın ekledikleri son-->


    <!-- Mervenin ekledikleri-->
    <!-- Import google fonts - Heading first/ text second -->
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../dist/css/main.css">
    <link rel="stylesheet" href="../dist/css/plugins.css">
    <link rel="stylesheet" href="../dist/css/custom.css">
    <link rel="stylesheet" href="../dist/css/bootstrap.css">
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
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>

    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>td{
      border: 1px solid #51bcdc;
      font-size:18px 
    }
    .error {color: #FF0000; font-weight:bold;}
    .bigfont {font-size: 20px;}
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">

 <div class="wrapper">
   <!-- Left side column. contains the logo and sidebar -->
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

      <!--Content wrapper-->
      <div class="contentwrapper" > 
        <!--ContentPlaceHolder1_pnlgenel-->
        <div id="ContentPlaceHolder1_pnlgenel">
         <!-- Start .panel-1 -->
         <form action="bep_gor.php" method="POST" enctype="multipart/form-data">
           <input type="text" id="studentID" name="studentID" style="display: none" <?php echo " value = ".$studentID." " ?>>
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

                  try{
                    $query = $conn->query("SELECT name FROM `student` WHERE `student_PK`='{$studentID}'");
                    $row=$query->fetch(PDO::FETCH_ASSOC);
                    echo "value=".$row['name']."";
                  }

                  catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();

                  }
                  ?>
                  > 
                </div>

                <label class="col-md-2 control-label">Soyadı:</label>
                <div class="col-md-3">
                  <input name="studentSurname" type="text" maxlength="64" class="form-control" readonly
                  <?php 
                  try{
                    $query = $conn->query("SELECT surname FROM `student` WHERE `student_PK`='{$studentID}'");
                    $row=$query->fetch(PDO::FETCH_ASSOC);
                    echo "value=".$row['surname']."";
                  }

                  catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();

                  }

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

                try{
                  $query = $conn->query("SELECT tc_no FROM `student` WHERE `student_PK`='{$studentID}'");
                  $row=$query->fetch(PDO::FETCH_ASSOC);
                  echo " value=".$row['tc_no']." ";
                }

                catch(PDOException $e){
                  echo "Connection failed: " . $e->getMessage();

                }
                ?>
                >
              </div> 

              <label class="col-md-2 control-label">Sınıfı:</label>
              <div class="col-md-3">
                <input name="studentClass" type="text" maxlength="8" class="form-control" readonly
                <?php 

                try{
                  $query = $conn->query("SELECT class FROM `student` WHERE `student_PK`='{$studentID}'");
                  $row=$query->fetch(PDO::FETCH_ASSOC);
                  echo " value=".$row['class']." ";
                }

                catch(PDOException $e){
                  echo "Connection failed: " . $e->getMessage();

                }

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

               try{
                $query = $conn->query("SELECT registration_date FROM `student` WHERE `student_PK`='{$studentID}'");
                $row=$query->fetch(PDO::FETCH_ASSOC);
                echo " value=".$row['registration_date']." ";
              }

              catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();

              }

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

             try{
              $query = $conn->query("SELECT deletion_date FROM `student` WHERE `student_PK`='{$studentID}'");
              $row=$query->fetch(PDO::FETCH_ASSOC);
              echo " value=".$row['deletion_date']." ";
            }

            catch(PDOException $e){
              echo "Connection failed: " . $e->getMessage();

            }

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
       <label class="col-md-2 control-label" for="">Bep Komisyonu:
        <span class="error bigfont">*</span></label>
        <div class="col-md-3">
          <div class=" input-group">
           <select id="framework1" name="framework1[]" multiple class="form-control" >
            <?php
            try{
              $query = $conn->query("SELECT `name`, `surname` FROM `personel`", PDO::FETCH_ASSOC);
              if ( $query->rowCount()) {
                foreach( $query as $row ){
                 echo "<option value=".$row['name']." ".$row['surname'] .">".$row['name']." ".$row['surname'] ."</option>" ;
               }
             }
           }

           catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();

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

   <label class="col-md-2 control-label" for="">Değerlendirme Tarihi:
     <span class="error bigfont">*</span></label>

     <div class="col-md-3">
      <div class=" input-group" >
       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
       <input id="degerlendirmeTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>
     </div>
   </div>

 </div>
</div>
<!-- form-group 5 END-->

<!--form-group 6 -->
<div class="form-group">
  <div class="row">

    <label class="col-md-2 control-label" for="">Dersler:
      <span class="error bigfont">*</span>
    </label>
    <div class="col-md-3">
      <div class=" input-group">



       <select id="framework" name="framework[]" multiple class="form-control" >
        <?php
        try{
          $query = $conn->query("SELECT lessons_PK, lesson_name FROM student S, student_lessons SL, lessons L WHERE S.student_PK ='$studentID' AND SL.student_FK = S.student_PK AND L.lessons_PK = SL.lesson_FK", PDO::FETCH_ASSOC);
          if ( $query != false) {
            foreach( $query as $row ){
              echo "<option value=".$row['lessons_PK'].">".$row['lesson_name']."</option>" ;
            }
          }
        }

        catch(PDOException $e){
          echo "Connection failed: " . $e->getMessage();
          exit();
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

<span class="error">* ile işaretli alanların doldurulması zorunludur!</span>
<span style="color:Red;font-weight:bold;"></span>
</div>

</div>


<button type='submit' id='kaydet' class='btn btn-success mr5 mb10'>Bep Oluştur</button>

</form>
<!-- FORM END-->
<!-- BEP Oluştur butonunun altının Başı -->
<div id="sectionBEP" class="col-lg-16">
 <div id='kazanimlar' style='padding-bottom: 5px'>

 </div>

</div>

<!-- BEP Oluştur butonunun altının sonu -->

</div>

</div>



</section><!-- Formu yazacağımız ikinci alan son -->

</div><!-- class: content-wrapper son -->
</div> <!-- class: wrapper son -->

</body>
</html>
<!-- Seymanın Ekledikleri BepKomısyonu multi-select-input START-->
<script>
 $(document).ready(function(){

  $('#framework').multiselect({
   nonSelectedText: 'Ders Seçiniz',
   enableFiltering: true,
   enableCaseInsensitiveFiltering: true,
   buttonWidth:'400px'
 });

  $('#framework1').multiselect({
    nonSelectedText: 'Komisyon üyesi Seçiniz',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'400px'
  });

/*
  $('#BEPForm').on('submit', function(event){
    event.preventDefault();
  });
*/
  /*
  $('#bepOluştur').on('click', function(){

    var degerlendirmeTarihi = document.getElementById('degerlendirmeTarihi').value;

    var id = document.getElementById('studentID').value;
    var ders_id = document.getElementById('framework').value;
    var kom_id = document.getElementById('framework1').value;
    var dersler_id = $('#framework').val();
    var komisyon_id =  $('#framework1').val();

    if(!id || !ders_id || !kom_id || !degerlendirmeTarihi){
      alert("*'lı Yerleri Doldurunuz!!");
    }
    else{
      $.ajax({
        url:"bep_verileri_cek.php",
        method:"POST",
        data:{dersler_id:dersler_id,komisyon_id:komisyon_id,id:id},
        success:function(data)
        {
          $("#kazanimlar").html(data);
        }
      });
    }
  });
  */

});

</script>

<!--Mervenin Ekledikleri Kaba değerlendirme tablo animasyonu js END -->

<?php  }
else{
  header("location: ../index.php");
}
?>