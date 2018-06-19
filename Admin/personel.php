<?php 
session_start();
if($_SESSION['access_type'] == "admin"){ 
	require_once "../connectDB.php";

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Albatros | Admin - Personeller</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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


<style type="text/css">
.table-striped{ background-color: #dddddd;}
.scrollable{height: 400px; overflow: scroll;}
</style>

<style>
.error {color: #FF0000; font-weight:bold;}
.bigfont {font-size: 20px;}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php require_once 'header.php'; 
		require_once 'sidebar.php'; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1 style="color:#000">
					Personel Bilgileri
					<small>..........</small>
				</h1>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<!-- /.box -->
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Personel Veri Tablosu</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">

								<form class="form-inline" action="" method="post" style="padding-bottom: 10px">
									<div class="form-group">
										<label for="">Adı:</label>
										<input type="text" class="form-control" name="firstname" id="adi" placeholder="Personelin Adı">
									</div>
									<div class="form-group">
										<label for="">Soyadı:</label>
										<input type="text" class="form-control" name="surname" id="soyadi" placeholder="Personelin Soyadı">
									</div>
									<button type="submit" class="btn btn-primary">Listele</button>
								</form>
								<div class="row">
									<div class="col-md-12">
										<div class="scrollable">
											<table id="example2" class="table table-bordered table-hover table-striped table-condens formatHTML5">
												<thead>
													<tr>
														<th>ID</th>
														<th>İsim</th>
														<th>Soyisim</th>
														<th>Durum</th>
														<th>Ünvan</th>
														<th>Telefon</th>                              
													</tr>
												</thead>
												<tbody id="tbody">
													<?php 	

													$name = null;
													$surname = null;



													if(isset($_POST['firstname']) && !empty($_POST['firstname']))
														$name = $_POST['firstname'];
													if(isset($_POST['surname']) && !empty($_POST['surname']))
														$surname = $_POST['surname'];

													if(isset($name) && isset($surname)){
														// $sql = "SELECT * FROM personel where name='".$name."' and surname=' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK".$surname."';";
													}
													else if(isset($name) && !isset($surname)){
														$sql = "SELECT * FROM personel p, personel_types pt where name like '%".$name."%' AND  p.personel_type_FK = pt.personel_type_PK;";
													}
													else if(!isset($name) && isset($surname)){
														$sql = "SELECT * from personel p, personel_types pt where surname like '%".$surname."%' AND  p.personel_type_FK=pt.personel_type_PK;";		
													}
													else if (!isset($name) && !isset($surname)) {
														$sql = "SELECT * from personel p, personel_types pt where p.personel_type_FK = pt.personel_type_PK;";
													}  

													unset($_POST['firstname']);
													unset($_POST['surname']);
													try{
														$retval = $conn->query($sql, PDO::FETCH_ASSOC);
														foreach ($retval as $row) {

															echo "<tr>";

															echo "<td class='id'>".$row['personel_PK']."</td>";
															echo "<td class='isim'>".$row['name']."</td>";
															echo "<td class='soyisim'>".$row['surname']."</td>";
															if($row['status'] == 1)
																echo "<td class='durum'>Kayıtlı</td>";
															else
																echo "<td class='durum'>Silindi</td>";
															echo "<td class='unvan'>".$row['personel_type']."</td>";
															echo "<td class='tel_no'>".$row['tel_no']."</td>";

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
								<div class="btn-group btn-group-justified" style="padding-bottom: 10px">
									<div class="btn-group">
										<a href="personel_ekle.php" class="btn btn-primary" role="button">&nbsp;&nbsp;Ekle&nbsp;&nbsp;</a>
									</div>
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

					<!--- START OF RIGHT PAGE ---->

					<div class="col-md-6">
						<!-- /.box -->
						<div class="box">
							<div class="box-header">
								<h3 id="personelInfoTitle" class="box-title">Personel - Bilgileri</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
								<div class="row">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Personel Bilgileri</a></li>
										<li><a data-toggle="tab" href="#loginInfo">Giriş Bilgileri</a></li>
									</ul>

									<div class="tab-content">	
										<div id="home" class="tab-pane fade in active">
											<div class="box box-primary"></div>
										</div>

										<div id="loginInfo" class="tab-pane fade">
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
																		<input id="password" class="form-control" type="password" data-date-inline-picker="false" data-date-open-on-focus="false"  placeholder="Yeni Şifre">
																	</div>
																</div>
															</div>
														</div>
														<input type="button" class="btn btn-primary" id="loginInfoChange" value="Değiştir">
														<span id="error"></span>
													</div>
												</div>
											</div>
											<!-- /.box-body -->
										</div>
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

<!-- ./wrapper -->



<div>
	<!-- Scripts Start-->

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
	<script>

		var date;
		$("#calendar").on("click",function(){
			alert("alert");
		});

		$("#showDate").on("click",function(){
			date = $("#selectedDate").val();
			alert(date);
		});

	</script>

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
				url:"getPersonelInfo.php",
				method:"POST",
				data :{id:id},
				success:function(data){
					document.getElementById("home").innerHTML = data;
				}
			});
			document.getElementById("personelInfoTitle").innerHTML = isim+" "+soyisim;
		});

		$('#loginInfoChange').on("click",function(){
			var u = document.getElementById("username").value;
			var p = document.getElementById("password").value;
			if(id > 0){
				$.ajax({
					url:"changePersonelLoginInfo.php",
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

		$('#duzenle').on("click",function(){
			if(durum == "Silindi"){
				alert("Bu öğrenci önceden silinmiştir. Üzerinde düzenleme yapılamaz.");
			}
			else if(id>0 && durum == "Kayıtlı")
				window.location = "personel_duzenle.php?id="+id;
			else
				alert("Bir Personel Seçin");
		});



		$("#silButton").on("click",function(){
			if(durum == "Silindi"){
				alert("Bu öğrenci önceden silinmiştir.");
			}

			else if(id > 0 && durum == "Kayıtlı"){
				var answer = confirm("Kaydı Silmeyi Onaylıyor Musunuz ??");
				if(answer){
					$.ajax({
						type:"POST",
						url:"deletePersonel.php",
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




		$("#notlar").on("click",function(){

		})
	</script>

</div>
</body>
</html>

<?php 
}
else{
	header("location: ../index.php");
}?>
