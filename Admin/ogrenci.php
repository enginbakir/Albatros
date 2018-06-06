<?php 
session_start();
ob_start();
if($_SESSION['access_type'] == "admin"){ 
	require_once "../connectDB.php";
	$access_id = $_SESSION['access_id'];

	?>
	<!DOCTYPE html>
	<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Albatros | Admin - Öğrenciler</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/myCss.css">
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
  	<!-- Calendar:)) -->
  	<link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.min.css">
  	<link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.css">
  	<link rel="stylesheet" href="../bower_components\fullcalendar\dist\fullcalendar.print.min.css" media="print">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.error {color: #FF0000; font-weight:bold;}
.bigfont {font-size: 20px;}
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
				<h1 style="color:#000">
					Öğrenci Bilgileri
					<small>...........</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
					<li><a href="ogrenci.php">Öğrenciler</a></li>
					<li class="active"></li>
				</ol>
			</section>

			<!-- Main content class="col-md-3" style="font-size: 5px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"-->
			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<!-- /.box -->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Öğrenci Veri Tablosu</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">

								<form class="form-inline" action ="" method="post" style="padding-bottom: 10px">
									<div class="form-group">
										<label >Adı:</label>
										<input type="text" class="form-control" name="firstname" id="adi" placeholder="Öğrencinin Adı" >
									</div>
									<div class="form-group">
										<label >Soyadı:</label>
										<input type="text" class="form-control" name="surname" id="soyadi" placeholder="Öğrencinin Soyadı" >
									</div>
									<button id="searchStudent" type="submit" class="btn btn-primary">Listele</button>
								</form>
								<div class="row">
									<div class="col-md-12">
										<div class="scrollable">
											<table id="example2"  class="table table-bordered table-hover table-striped table-condens formatHTML5"> 
												<!-- <table class="formatHTML5">-->
													<thead>
														<tr>
															<!-- <th>&nbsp;</th> -->
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
															$sql = "SELECT * FROM student where name='".$name."' and surname='".$surname."';";
														}
														if(isset($name) && !isset($surname)){
															$sql = "SELECT * FROM student where name like '%".$name."%';";
														}
														if(!isset($name) && isset($surname)){
															$sql = "SELECT * from student where surname like '%".$surname."%';";
														}
														if (!isset($name) && !isset($surname)) {
															$sql = "SELECT * FROM student ";
														}
														unset($_POST['firstname']);
														unset($_POST['surname']);
														try{
															$retval = $conn->query($sql, PDO::FETCH_ASSOC);
															foreach ($retval as $row) {
																echo "<tr>";

																echo "<td class='id'>".$row['student_PK']."</td>";
																echo "<td class='isim'>".$row['name']."</td>";
																echo "<td class='soyisim'>".$row['surname']."</td>";
																if($row['status'] == 1)
																	echo "<td class='durum'>Kayıtlı</td>";
																else
																	echo "<td class='durum'>Silindi</td>";
																if($row['gender_FK'] == 1)
																	echo "<td> KIZ </td>";
																else	
																	echo "<td class='gender'>Erkek</td>
																<td class='sinif'>".$row['class']."</td>";
																
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

											<div class="col col-s-6"> <?php echo "<br>Kayıtlı Öğrenci Sayısı: ".$retval->rowCount(); ?>
											</div>
											<div class="col col-xs-8">
												<ul class="pagination hidden-xs pull-right">
												</div>
											</div>
										</div>      
										<div class="btn-group btn-group-justified" style="padding-bottom: 10px">
											<div class="btn-group">
												<a href="ogrenci_ekle.php" class="btn btn-primary" role="button">&nbsp;&nbsp;Ekle&nbsp;&nbsp;</a></div>
												<div class="btn-group">
													<button id="silButton" type="button" class="btn btn-primary">&nbsp;&nbsp;Sil&nbsp;&nbsp;</button>
												</div>
												<div class="btn-group">
													<button id="duzenle" type="button" class="btn btn-primary">&nbsp;&nbsp;Düzenle&nbsp;&nbsp;</button>
												</div>
											</div>           
										</div>
										<!-- /.box-body -->
									</div>
									<!-- /.box -->
								</div>



								<!-- START OF RIGHT PAGE -->

								<div class="col-md-6">
									<!-- /.box -->
									<div class="box">
										<div class="box-header">
											<h3 id="studentInfoTitle" class="box-title"> Öğrenci Bilgiler</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
											<div class="row">
												<ul class="nav nav-tabs">
													<li id="notlar" class="active"><a data-toggle="tab" href="#home">Notlar</a></li>
													<li><a data-toggle="tab" href="#menu1">Veli Bilgileri</a></li>
													<li><a data-toggle="tab" href="#menu2">Öğrenci Bilgileri</a></li>
													<li><a data-toggle="tab" href="#menu3">Dersler</a></li>
													<li><a data-toggle="tab" href="#menu4">Giriş Bilgileri</a></li>


												</ul>

												<div class="tab-content">
													<div id="home" class="tab-pane fade in active">
														<div class="row">
															<div class="col-md-12" style="margin-bottom: 10px;">
																<div class="scrollable">
																	<table id="example23" class="table table-bordered table-hover table-striped table-condens formatHTML5">
																		<thead>
																			<tr>
																				<th>Öğretmen</th>
																				<th>Not</th>
																				<th>Tarih</th>
																			</tr>
																		</thead>
																		<tbody id="notes">

																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<div id="menu1" class="tab-pane fade">
														
													</div>
													<div id="menu2" class="tab-pane fade">
														<div class="box box-primary">
															<div id="studentInfo" class="box-body box-profile">
																
															</div>
															<!-- /.box-body -->
														</div>
													</div>
													
													<div id="menu3" class="tab-pane fade">
														<div id="message"><span class="error">Ders Eklemek veya Silmek İçin Öğrenci Seçin</span></div>
														<br>
														<div class="row">
															<div class="col-md-12" id="dersler">
																<table class="table table-bordered table-hover table-condens ">
																	<thead>
																		<tr>
																			<th>Dersler</th>
																		</tr>
																	</thead>
																	<tbody id="lessonsList">

																	</tbody>
																</table>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<select id="dersSelect" class="fancy-select form-control fancified" >
																	<option value="3">Okuma/Yazma - Türkçe</option>
																	<option value="5">Matematik</option> 
																	<option value="4">Öğrenmeye Hazırlık</option> 
																</select>
															</div>

														</div>
														<br>
														<input id="dersEkle" value="Yeni Ders Ekle" class="col-md-3 btn btn-primary">
														<input id="dersSil" value="Ders Sil" class="col-md-3 btn btn-primary">
														
													</div>
													<div id="menu4" class="tab-pane fade">
														<div class="col-md-12">
															<div class="box-body box-profile">
																<div class="row">
																	<div class="form-group">
																		<div class="row">
																			<label class="col-md-4 control-label" for="">Yeni Üye Adı:</label>
																			<div class="col-md-8">
																				<div class="input-group">
																					<input id="username" class="form-control" type="text" data-date-inline-picker="false" data-date-open-on-focus="false" placeholder="Yeni Üye Adı" >
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<label class="col-md-4 control-label" for="">Yeni Şifre:</label>
																			<div class="col-md-8">
																				<div class="input-group">
																					<input id="password" class="form-control" type="password" data-date-inline-picker="false" data-date-open-on-focus="false" placeholder="Yeni Şifre">
																				</div>
																			</div>
																		</div>
																	</div>
																	<input type="button" class="btn btn-primary" id="loginInfoChange" value="Değiştir">
																	<span id="error"></span>
																</div>
															</div>
														</div>
													</div>

												</div>

											</div>

										</div>

									</div>
								</div>
								<!-- END OF RIGHT PAGE -->
							</div>
						</section>

					</div>

					<?php
					include 'footer.php'; 
					?> 


				</div>

				<div>

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
					<!-- Slimscroll -->
					<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
					<!-- FastClick -->
					<script src="../bower_components/fastclick/lib/fastclick.js"></script>
					<!-- AdminLTE App -->
					<script src="../dist/js/adminlte.min.js"></script>
					<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
					<script src="../dist/js/pages/dashboard.js"></script>
					<!-- AdminLTE for demo purposes -->
					<script src="../dist/js/demo.js"></script>
					<!-- Page specific script -->				

					<script type="text/javascript">
						var id = -1;
						var isim; 
						var soyisim;
						var durum;

						$("#tbody tr").click(function () {

							$('.selected').removeClass('selected');
							$(this).addClass("selected");
							id = $('.id',this).text();
							isim = $('.isim',this).text();
							soyisim = $('.soyisim',this).text();
							durum =$('.durum',this).text();
							$.ajax({  
								url:"load_notes.php",  
								method:"POST",  
								data:{id:id},  
								success:function(data){  
									$('#notes').html(data);
								}  
							});  
							document.getElementById("studentInfoTitle").innerHTML = isim+" "+soyisim;

							$.ajax({
								url:"getStudentInfo.php",
								method:"POST",
								data :{id:id},
								success:function(data){
									$("#studentInfo").html(data);
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
								url:"studentLessons.php",
								method:"POST",
								data:{id:id},
								success:function(data){
									$('#lessonsList').html(data);
								}
							});
						});

						$("#silButton").on("click",function(){
							if(durum == "Silindi"){
								alert("Bu öğrenci daha önceden silinmiştir.");
							}
							else if(id > 0 && durum == "Kayıtlı"){
								var answer = confirm("Kaydı Silmeyi Onaylıyor Musunuz ??");
								if(answer){
									$.ajax({
										type:"POST",
										url:"deleteStudent.php",
										data:{id:id,isim:isim},
										success:function(data){
											alert(data);
											location.reload();
										}
									});
								}
								else {
									return false;
								}
							}
							else
								alert("Bir Kayıt Seçin!!!");
						});

						$('#duzenle').on("click",function(){
							if(durum == "Silindi"){
								alert("Bu öğrenci önceden silinmiştir. Üzerinde düzenleme yapılamaz.");
							}
							else if(id>0 && durum == "Kayıtlı")
								window.location = "ogrenci_duzenle.php?id="+id;
							else
								alert("Bir Öğrenci Seçin");
						});
						$('#dersSil').on("click",function(){
							if(id > 0){
								var dersID =  $('#dersSelect').val();
								$.ajax({
									url:"studentLessons.php",
									method:"POST",
									data:{deleteID:id,dersID:dersID},
									success:function(data){
										$('#message').html(data);
									}
								});
							}
							else
								alert("Bir Öğrenci Seçin");
						});
						$('#dersEkle').on("click",function(){
							var dersID =  $('#dersSelect').val();
							$.ajax({
								url:"studentLessons.php",
								method:"POST",
								data:{insertID:id,dersID:dersID},
								success:function(data){
									$('#message').html(data);
								}
							});
						});	
						$('#loginInfoChange').on("click",function(){
							var u = document.getElementById("username").value;
							var p = document.getElementById("password").value;
							if(id > 0){
								$.ajax({
									url:"changeStudentLoginInfo.php",
									method:"POST",
									data :{id:id,u:u,p:p},
									success:function(data){ 
										alert(data);
									}
								});
							}
							else{
								alert("Personel Seçiniz");
							}
						});

					</script>

					<script>
						$( function() {
							$( "#datepicker" ).datepicker();
						} );
					</script>

				</div>
				<!-- Scripts End-->
			</body>
			</html>

			<?php 
		}
		else{
			header("location: ../index.php");
		}
		ob_end_flush();
		exit();
		?>