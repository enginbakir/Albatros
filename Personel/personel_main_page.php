<?php 

session_start();
if($_SESSION['access_type'] == 'personel'){

	try{
		require_once "../connectDB.php";
		$id = $_SESSION['access_id'];
		$access_id = $_SESSION['access_id'];
		$sql = "SELECT * FROM personel_user where userPersonel_PK = '$id'";
		$result = $conn->query($sql, PDO::FETCH_ASSOC)->fetch();
		$personelID = $result['personel_FK'];		
    if(isset($_SESSION['errorMessage'])){
      $errorMessage = $_SESSION['errorMessage'];
      unset($_SESSION['errorMessage']);
    }else{
      $errorMessage = "";
    }
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
     <!-- En son derlenmiş ve minimize edilmiş JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!-- AdminLTE App -->
     <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/myCss.css">
     <link rel="stylesheet" href="../dist/css/main.css">
     <link rel="stylesheet" href="../dist/css/jquery.lwMultiSelect.css">
     <script src="../dist/js/jquery.lwMultiSelect.js"></script>
     <style>
     .error {color: #FF0000; font-weight:bold;}
     .bigfont {font-size: 20px;}
   </style>
 </head>

 <body class="hold-transition skin-blue sidebar-mini">
   <input id="personel_PK" type="text" style="display: none" <?php echo " value = '".$personelID."'"; 
   echo $personelID;
   ?> >
   <div class="wrapper">
    <!--Main Page Header -->
    <?php include 'header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'personelPageSidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1 style="color:#000">
       Öğrenci Bilgileri
       <small>...........</small>
     </h1>

   </section>
   <!-- Content Header (Page header) END-->

   <section class="content">
    <div class="row">
     <div class="col-md-12">
      <div class="row">
       <div class="col-md-6">
        <!-- BOX Öğrenci Veri Tablosu START-->
        <div class="box">
         <div class="box-header">
          <h3 class="box-title">Öğrenci Veri Tablosu</h3>
          <span class="error bigfont"><?php echo $errorMessage; ?></span>
        </div>
        <div class="box-body">
          <!--FORM1 Öğrenci Veri Tablosu START-->
          <form class="form-inline" action ="" method="post" style="padding-bottom: 10px">
           <!--Content wrapper START-->
           <div class="form-group">
            <label >Adı:</label>
            <input type="text" class="form-control" name="firstname" id="adi" placeholder="Öğrencinin Adı" >
          </div>
          <div class="form-group">
            <label >Soyadı:</label>
            <input type="text" class="form-control" name="surname" id="soyadi" placeholder="Öğrencinin Soyadı" >
          </div>
          <button id="searchStudent" type="submit" class="btn btn-primary">Listele</button>
          <!--Content wrapper END-->
        </form>
        <!--FORM1 Öğrenci Veri Tablosu END-->

        <!--FORM2 Öğrenci Veri Tablosu START-->

        <!--Content wrapper START-->
        <div class="contentwrapper" > 
         <div class="row">
          <div class="col-md-12">
           <div class="scrollable">
            <table id="öğrenciVeriTableID" class="table table-bordered table-hover table-striped table-condens formatHTML5">
             <thead>
              <tr>
               <th>ID</th>
               <th>İsim</th>
               <th>Soyisim</th>
               <th>Durum</th>
               <th>Cinsiyet</th>
               <th>Sınıf</th>
             </tr>
           </thead>

           <tbody id="tbody">

            <?php
            $name;
            $surname;
            if(isset($_POST['firstname']) && !empty($_POST['firstname']))
             $name = $_POST['firstname'];
           if(isset($_POST['surname']) && !empty($_POST['surname']))
             $surname = $_POST['surname'];                       
           if(isset($name) && isset($surname)){
             $sql = "SELECT * FROM student where status = 1 AND personel_FK = '$personelID' AND name='".$name."' and surname='".$surname."';";
           }
           if(isset($name) && !isset($surname)){
             $sql = "SELECT * FROM student where status = 1 AND personel_FK = '$personelID' AND name like '%".$name."%';";
           }
           if(!isset($name) && isset($surname)){
             $sql = "SELECT * from student where status = 1 AND personel_FK = '$personelID' AND surname like '%".$surname."%';";
           }
           if (!isset($name) && !isset($surname)){
             $sql = "SELECT * FROM student where status = 1 AND personel_FK = '$personelID'";
           }
           unset($_POST['firstname']);
           unset($_POST['surname']);
           try{
             $retval = $conn->query($sql, PDO::FETCH_ASSOC);
             foreach ($retval as $row) {
              echo "<tr>";
              echo "<td class='id'>" .$row['student_PK']. "</td>";
              echo "<td class='isim'>" .$row['name']. "</td>";
              echo "<td class='soyisim'>" .$row['surname']. "</td>";
              if($row['status'] == 1)
               echo "<td class='durum'>Kayıtlı</td>";
             else
               echo "<td class='durum'>Silindi</td>";
             if($row['gender_FK'] == 1)
              echo "<td>KIZ</td>";
            else
             echo "<td>ERKEK</td>";
           echo "<td>" .$row['class']."</td>";
           
           echo "</tr>";
         }
       }
       catch(Exception $e) { 
         echo "Listeleme Hatası :".$e->getMessage();
       }
       ?>

     </tbody>
   </table>
 </div>
</div>
</div>										 	
</div>
<!--Content wrapper END-->

<!--FORM2 Öğrenci Veri Tablosu END-->
<div class="btn-group btn-group-justified" style="padding-bottom: 10px">
 <div class="btn-group">
  <button id="bepOlustur" type="button" class="btn btn-primary" ">&nbsp;&nbsp;BEP Oluştur&nbsp;&nbsp;</button>
</div>
<div class="btn-group">
  <button id="kabaDegerlendirme" type="button" class="btn btn-primary" ">&nbsp;&nbsp;Kaba Değerlendirme&nbsp;&nbsp;</button>
</div>
</div>

</div>

</div>
<!-- BOX Öğrenci Veri Tablosu END-->
</div>

<div class="col-md-6">
  <!-- BOX Kişi Bilgi Tablosu START-->
  <div class="box">
   <div class="box-header">
    <h3 id="studentInfoTitle" class="box-title">Öğrenci - Bilgileri</h3>
  </div>

  <div class="box-body" style="padding-right: 20px; padding-left: 20px;">
    <div class="row">
     <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Notlar</a></li>
      <li><a data-toggle="tab" href="#menu1">Veli Bilgileri</a></li>
      <li><a data-toggle="tab" href="#menu2">Öğrenci Bilgileri</a></li>
      <li><a id = "openMenu3" data-toggle="tab" href="#menu3">Devamsızlık </a></li>
      <li><a data-toggle="tab" href="#menu4">Ödeme </a></li>
    </ul>

    <div class="tab-content">
      <!-- Page-NOTLAR START -->
      <div id="home" class="tab-pane fade in active">
       <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
         <div class="form-group">
          <div class="scrollable">
           <table id="example23" class="table table-bordered table-hover table-striped table-condens formatHTML5">
            <thead>
             <tr>
              <th>Öğretmen</th>
              <th>Tarih</th>
              <th>Not</th>
            </tr>
          </thead>
          <tbody id="notes">
           <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>

    <ul class="list-group list-group-unbordered">
     <li class="list-group-item">
      <input id="studentNote" class="form-control" type="text" placeholder="Not">
    </li>
  </ul>

  <input  type="button" class="btn btn-primary col-md-2" id="insertnote" value="Not Ekle">
  <div class="col-md-2" id="deleteDiv" ></div>
  <span id="error"></span>
</div>

</div>
</div>
</div>
<!-- Page-NOTLAR END -->

<!-- Page-VELİ BİLGİLERİ START -->
<div id="menu1" class="tab-pane fade">
  <li >
    <a class='pull-left error bigfont'>Bir Öğrenci Seçin</a>
  </li>
</ul>
</div>

<!-- Page-ÖĞRENCİ BİLGİLERİ START -->
<div id="menu2" class="tab-pane fade">
 <div class="box box-primary">
  <div class="box-body box-profile">
   <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar5.png" alt="User profile picture">
   <h3 class="profile-username text-center">Engin Bakır</h3>
   <ul class="list-group list-group-unbordered">
    <li class="list-group-item">
     <b>TC</b> <a class="pull-right">0</a>
   </li>
   <li class="list-group-item">
     <b>Adres</b> <a class="pull-right"></a>
   </li>
   <li class="list-group-item">
     <b>Ulaşım</b> <a class="pull-right"></a>
   </li>
   <li class="list-group-item">
     <b>Eğitsel Tanı</b> <a class="pull-right"></a>
   </li>

   <li class="list-group-item">
     <b>Dönem Başlayış Tarihi</b><a class="pull-right">18.09.2017</a>
   </li>
   <li class="list-group-item">
     <b>Dönem Bitiş Tarihi</b> <a class="pull-right">07.06.2018</a>
   </li>
   <li class="list-group-item">
    <b>Kaba Değerlendirme</b>
    <form action="kaba_gor.php" method="POST" enctype="multipart/form-data">
      <input type="text" id="studentID" name="studentID" style="display: none;">
      <div class="row"> 
        <div class="col-md-6">
          <select id="framework" name="framework[]"  multiple class="form-control" >
            <option value="5">Matematik</option>
            <option value="3">Okuma/Yazma Türkçe</option>
            <option value="4">Öğrenmeye Hazırlık</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
         <input id="kabaSil" class="col-md-6 btn btn-primary pull-right" value="Sil"> 
         <button type="submit" id="kabaGoruntule" class="col-md-6 btn btn-primary pull-left" >Görüntüle</button>
       </div>
     </div>
   </form>
 </li>
</ul>
</div>
</div>
</div>

<!-- Page-ÖĞRENCİ BİLGİLERİ END -->


<!-- Page-DEVAMSIZLIK BİLGİLERİ START -->

<div id="menu3" class="tab-pane fade">
 <div class="row">
  <div class="col-md-12">
   <div class="form-group">
    <div class="row">
     <br>
     <label class="col-md-2 control-label" style="
     padding-top: 10px;padding-left: 30px; padding-right: 0px;">Tarih : </label>
     <div class="col-md-4">
      <div class="input-group">
       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
       <input id="devamsizlikTarihi" class="form-control" type="date" data-date-inline-picker="false" data-date-open-on-focus="false" />
     </div>
   </div>
   <div class="col-md-4">
    <input id="devamsizlikAciklama" type="text" maxlength="64"class="form-control" placeholder="Açıklama">
  </div>

  <button type="submit" id="button2" class="btn btn-primary"><i class="fa fa-folder"></i>Kaydet</button> 

</div>

<br>
<table border="1" class="table table-bordered table-hover">
 <thead>
  <tr>
   <th>*</th>
   <th>Tarih</th>
   <th>Durum</th>
   <th>Açıklama</th>
 </tr>
</thead>
<tbody id = "devamsizlikListesi">

</tbody>
</table>
</div>
<!-- End .form-group 1 -->
</div>
</div>
</div>
<!-- Page-DEVAMSIZLIK BİLGİLERİ END -->

<!-- Page-ÖDEME BİLGİLERİ START -->
<div id="menu4" class="tab-pane fade">
  <div class="form-group">
    <div id="payment_info">
      <!-- .............. PAYMENT_PAGE.PHP ................ -->
    </div>                            
  </div>
</div>

<!-- Page-ÖDEME BİLGİLERİ END -->
</div>
</div>
</div>
</div>
<!-- BOX Kişi Bilgi Tablosu END-->
</div>
</div>
</div>
</div>
</section>
</div>
<!-- Content Wrapper END-->
</div>

<script>
  $(document).ready(function(){
   $('#framework').multiselect({
    nonSelectedText: 'Ders seçiniz',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'400px'
  });
   $('#framework1').multiselect({
    nonSelectedText: 'Ders Seçiniz',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'400px'
  });

   var personelID;
   var id;


			/// To Change Selected HTML Table Row Background Color START
			function selectedRow(){
				var index,isim,soyisim;
				var table = document.getElementById("öğrenciVeriTableID");
				for(var i = 1; i < table.rows.length; i++)
				{
					table.rows[i].onclick = function()
					{
                         // remove the background from the previous selected row
                         if(typeof index !== "undefined"){
                         	table.rows[index].classList.toggle("selected");
                         }
                        // get the selected row index
                        index = this.rowIndex;
                        // add class selected to the row
                        $('.selected').removeClass('selected');
                        $(this).addClass("selected");
                        id = $('.id',this).html();
                        personelID = document.getElementById('personel_PK').value;

                        $.ajax({
                          url:"getStudentInfo.php",
                          method:"POST",
                          data :{id:id},
                          success:function(data){
                         //  $("#ogrenciPhoto").attr('src', data);
                       }
                     });
                        $.ajax({  
                          url:"payment_page.php",  
                          method:"POST",  
                          data:{id:id},
                          success:function(data){ 
                            $('#payment_info').html(data);  

                            $('#date_odeme').lwMultiSelect();

                            $('.action').change(function(){
                              if($(this).val() != '')
                              {
                                var action = $(this).attr("id");
                                var query = $(this).val();
                                var student_id = $('#student_id').val();
                                var result = '';
                                if(action == 'aylar')
                                {
                                  result = 'date_odeme';
                                }
                                $.ajax({
                                  url:'payment_fetch.php',
                                  method:"POST",
                                  data:{action:action, query:query,student_id:student_id},
                                  success:function(data)
                                  {

                                    $('#'+result).html(data);
                                    if(result == 'date_odeme')
                                    {
                                      $('#date_odeme').data('plugin_lwMultiSelect').updateList();
                                    }
                                  }
                                })
                              }
                            });

                            $('#insert_data').on('submit', function(event){
                              console.log('edildi');
                              event.preventDefault();
                              if($('#aylar').val() == '')
                              {
                                alert("Lütfen bir ay seçiniz!");
                                return false;
                              }
                              else if($('#date_odeme').val() == '')
                              {
                                alert("Lütfen gün seçiniz!");
                                return false;
                              }
                              else
                              {
                                $('#hidden_date_odeme').val($('#date_odeme').val());
                                var dates = $('#hidden_date_odeme').val().split(',');
                                var aylar = $('#aylar').val();
                                var odeme_bilgisi = $('#odeme_bilgisi').val();
                                var form_data = $('#insert_data').serialize();
                                $.ajax({
                                  url:"payment_insert.php",
                                  method:"POST",
                                  data:{odeme_bilgisi:odeme_bilgisi,aylar:aylar,dates:dates,id:id,personelID:personelID},
                                  success:function(data)
                                  {
                                    if(data == 'done')
                                    {
                                      $('#date_odeme').html('');
                                      $('#date_odeme').data('plugin_lwMultiSelect').updateList();
                                      $('#date_odeme').data('plugin_lwMultiSelect').removeAll();
                                      $('#insert_data')[0].reset();
                                      alert('Data Inserted');
                                    }
                                  }
                                });
                              }
                            });


                          }  
                        });  

                        $.ajax({
                        	url:"load_notes.php",  
                        	method:"POST", 
                        	data:{id:id,personelID:personelID}, 
                        	dataType: 'json',
                        	cache:false, 
                        	success:function(data){ 
                        		$('#notes').html(data.value1);  
                        		$('#deleteDiv').html(data.value2);
                        	}  
                        });  
                        document.getElementById("studentInfoTitle").innerHTML = isim+" "+soyisim+" Bilgileri";
                        document.getElementById("studentID").value = id;
                        $.ajax({  
                        	url:"load_attendance.php",  
                        	method:"POST",  
                        	data:{id:id},
                        	success:function(data){ 
                        		$('#devamsizlikListesi').html(data);  
                        	}  
                        }); 
                        $.ajax({
                        	url:"process.php",
                        	method:"POST",
                        	data:{id:id},
                        	success:function(data){
                        		$('#odemeBody').html(data);
                        	}
                        });
                        $.ajax({
                          url:"getParentInfo.php",
                          method:"POST",
                          data:{id:id},
                          success:function(data){
                            $('#menu1').html(data);
                          }
                        });
                        $.ajax({
                        	url:"getStudentInfo.php",
                        	method:"POST",
                        	data:{id:id},
                        	success:function(data){
                        		
                        	}
                        });
                      };
                    }
                  }
                  
                  selectedRow();

                  $('#kabaDegerlendirme').on("click",function(){
                   window.location="kaba_degerlendirme.php?id="+id;
                 });
                  $('#bepOlustur').on("click",function(){  
                    if(id>0){  
                     window.location = "bep_main_page.php?id="+id;
                   }
                   else{
                    alert ("Bir Öğrenci Seçiniz!!");
                  }
                });
                  $('#insertnote').on("click",function(){
                   var note = $("#studentNote").val();
                   $.ajax({
                    url:"insertnote.php",
                    method:"POST",
                    data:{id:id,note:note,personelID:personelID}, 
                    success:function(data){
                     alert(data);

                   }
                 });
                 });
                  $("#button2").click(function(){
                   var tarih = $("#devamsizlikTarihi").val();
                   var aciklama = $("#devamsizlikAciklama").val();
                   $.ajax({
                    url:'insert.php',
                    method:'POST',
                    data:{
                     tarih:tarih,
                     aciklama:aciklama,
                     id:id
                   },
                   success:function(data){
                     alert(data);
                     location.reload();

                   }
                 });
                 });

        /*
        $('#bepGoruntule').on("click",function(){
          var w = window.innerWidth;
          var h = window.innerHeight;
          var dersler_id = $('#framework').val();
          var komisyon_id =  $('#framework1').val();
          if(id > 0)
            window.open("http://localhost/Albatros/Personel/openBep.php?id="+id+"&w="+w+"&h="+h);
          else{
            alert("Bir Öğrenci Seçiniz");
          }
        });
        */
        $('#kabaSil').on("click",function(){
          var dersler_id = $('#framework').val();
          $.ajax({
            url:'kaba_sil.php',
            method:'POST',
            data:{dersler_id:dersler_id,id:id},
            success:function(data){
              alert(data);
            }
          });
        });
      });

    </script>		


  </body>
  </html>

  <?php 
  $conn = null;
  exit();
}catch(Exception $e) { 
  // $_SESSION['login_error'] = $e->getMessage(); 
	$_SESSION['login_error'] = "Veri Tabanı Hatası!!! ".$e->getMessage();
	header("location: cikis.php");
}
}
else {
  header("location: ../index.php");
  exit();
}  
?>