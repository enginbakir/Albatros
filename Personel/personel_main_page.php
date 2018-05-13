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


  	<style>
  	tr{cursor: pointer; transition: all .25s ease-in-out}
  	.selected{background-color: blue;  color: #fff;}
  	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>td{
  		border: 1px solid #51bcdc;
  		font-size:18px 
  	}
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
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Students</a></li>
					<li class="active">Data tables</li>
				</ol>
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
													<table id="öğrenciVeriTableID" class="table table-bordered">
														<thead>
															<tr>
																<th>ID</th>
																<th>İsim</th>
																<th>Soyisim</th>
																<th>Durum</th>
																<th>Cinsiyet</th>
																<th>Sınıf</th>
																<th>Devamsızlık</th>
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
																$sql = "SELECT * FROM student where personel_FK = '$personelID' AND name='".$name."' and surname='".$surname."';";
															}
															if(isset($name) && !isset($surname)){
																$sql = "SELECT * FROM student where personel_FK = '$personelID' AND name like '%".$name."%';";
															}
															if(!isset($name) && isset($surname)){
																$sql = "SELECT * from student where personel_FK = '$personelID' AND surname like '%".$surname."%';";
															}
															if (!isset($name) && !isset($surname)) {
																$sql = "SELECT * FROM student where personel_FK = '$personelID'";
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
																	echo "<td>" .$row['gender_type']. "</td>";
																	echo "<td>" ." ". "</td>";
																	echo "<td>" ." ". "</td>";
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
															<table id="example23" class="table table-bordered table-hover">
																<thead>
																	<tr>
																		<th>Öğretmen</th>
																		<th>Not</th>
																	</tr>
																</thead>

																<tbody id="notes">
																	<tr>
																		<td>Nazlı Başak</td>
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
												<!-- Page-NOTLAR END -->

												<!-- Page-VELİ BİLGİLERİ START -->
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
												<!-- Page-VELİ BİLGİLERİ END -->

												<!-- Page-ÖĞRENCİ BİLGİLERİ START -->
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

												<!-- Page- ÖDEME BİLGİLERİ START -->


												<?php
												include('process.php');
												$newobj = new processing();
												?>

												<div id="menu4" class="tab-pane fade">
													<div class="row">
														<div class="col-md-12">
															<table border="1" class="table table-bordered table-hover">
																<thead>
																	<tr>
																		<th>ID</th>
																		<th>AYLAR</th>
																		<th>ÖDEMEBİLGİSİ</th>
																		<th>SEÇ</th>
																	</tr>
																</thead>

																<tbody id="odemeBody">

																	<?php echo $newobj->display();?>
																	
																</tbody>
																
															</table>

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
			var personelID;
			var id;
			$.ajax({
				url:"getStudentInfo.php",
				method:"POST",
				data :{id:id},
				success:function(data){
					$("#ogrenciPhoto").attr('src', data);
				}
			});
			$(".selectstatus").change(function(){
				var statusname = $(this).val();                  
				var getid = $(this).attr("status-id");             
				$.ajax({
					type:'POST',
					url:'ajax.php',
					data:{statusname:statusname,getid
						:getid},
						success:function(result){
							location.reload();
							$("#display").html(result);
							alert(result);
						}
					});
			});
			/// To Change Selected HTML Table Row Background Color START
			function selectedRow(){
				var index,isim,soyisim;
				table = document.getElementById("öğrenciVeriTableID");
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
                        isim =$('.isim',this).html();
                        soyisim =$('.soyisim',this).html();
                        personelID = document.getElementById('personel_PK').value;
                        $.ajax({
                        	url:"load_notes.php",  
                        	method:"POST",  
                        	data:{id:id,personelID:personelID},  
                        	success:function(data){ 
                        		$('#notes').html(data);  
                        	}  
                        });  
                        document.getElementById("studentInfoTitle").innerHTML = isim+" "+soyisim+" Bilgileri";
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
                    };
                }
            }
            selectedRow();
/// To Change Selected HTML Table Row Background Color END
        //Redirect to kaba_degerlendirme 
        $('#kabaDegerlendirme').on("click",function(){
        	window.location="kaba_degerlendirme.php?id="+id;
        });
        //Redirect to bep_main_page 
        $('#bepOlustur').on("click",function(){    
        	window.location = "bep_main_page.php?id="+id;
        });
        $("#button2").click(function(){
        	var tarih=$("#devamsizlikTarihi").val();
        	var aciklama=$("#devamsizlikAciklama").val();
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
    });
</script>		


</body>
</html>

<?php 
}catch(Exception $e) { 
  // $_SESSION['login_error'] = $e->getMessage(); 
	$_SESSION['login_error'] = "Veri Tabanı Hatası!!! ".$e->getMessage();
	header("location: cikis.php");
}
}
else {
	header("location: ../index.php");
	exit();
} ?>