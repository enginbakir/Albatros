<?php 
session_start();

if($_SESSION['access_type'] == "personel"){ 

	require_once "../connectDB.php";
	$id = $_GET['id'];
	$access_id = $_SESSION['access_id'];

	?>

	<!DOCTYPE html>
	<html>
	<head> 

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Albatros</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
		<!--Kaba değerlendirme tablo animasyonu css i -->
		<link rel="stylesheet" href="../dist/css/accordion.css"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
		<!-- En son derlenmiş ve minimize edilmiş JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="../dist/js/adminlte.min.js"></script>
		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

		<!-- Tablo cizgileri için css yazdım. -->
		<style>
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

			
			<section class="content">

				<form action="insert_kaba_degerlendirme.php" method="post">

					<input type="text" id="studentID" name="studentID" style="display: none" <?php echo " value = ".$id." " ?>>
					<div class="contentwrapper">
						<!--Content wrapper-->
						<div id="ContentPlaceHolder1_pnlgenel">

							<div class="col-lg-16 ">
								<div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">
									<!-- Start .panel -->
									<div class="panel-heading">
										<h4 class="panel-title">Kaba Değerlendirme Formu </h4>
										<span class="error bigfont"><?php echo $_SESSION['successErr']; ?></span>
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
															$query = $conn->query("SELECT name FROM `student` WHERE `student_PK`='{$id}'");
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
															$query = $conn->query("SELECT surname FROM `student` WHERE `student_PK`='{$id}'");
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
															$query = $conn->query("SELECT tc_no FROM `student` WHERE `student_PK`='{$id}'");
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
															$query = $conn->query("SELECT class FROM `student` WHERE `student_PK`='{$id}'");
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
																$query = $conn->query("SELECT registration_date FROM `student` WHERE `student_PK`='{$id}'");
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
																$query = $conn->query("SELECT deletion_date FROM `student` WHERE `student_PK`='{$id}'");
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
													<label class="col-md-2 control-label" for="">Değerlendiren: 
														<span class="error bigfont">*</span>
													</label>
													
													<div class="col-md-3">
														<div class=" input-group">
															<select id="framework1" name="framework1[]" multiple class="form-control" >
																<?php
																try{
																	$query = $conn->query("SELECT `personel_PK`,`name`, `surname` FROM `personel` WHERE status = '1'", PDO::FETCH_ASSOC);
																	if ( $query != false) {
																		foreach( $query as $row ){
																			echo "<option value=".$row['personel_PK'].">".$row['name']." ".$row['surname'] ."</option>" ;
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
														<span class="error bigfont">*</span>
													</label>
													<div class="col-md-3">
														<div class=" input-group" >
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input id="degerlendirmeTarihi" name="degerlendirmeTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false"/>
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
																	$query = $conn->query("SELECT lessons_PK, lesson_name FROM student S, student_lessons SL, lessons L WHERE S.student_PK ='$id' AND SL.student_FK = S.student_PK AND L.lessons_PK = SL.lesson_FK", PDO::FETCH_ASSOC);
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
								<input name="submit" id="degerlendir" value="Değerlendirme" class="btn btn-success mr5 mb10">
							</div>

							<!-- .panel-1 END-->
						</div>
					</div>

  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>


  	<!-- panel-2 START-->
  	<!--Kaba değerlendirme tablo animasyonu html i -->

  	<div class="col-lg-16">
  		<div class='panel panel-default toggle panelMove panelRefresh'>
  			<div class='panel-body'>
  				<div id='kazanimlar' class='accordion collapse in' style='padding-bottom: 5px'>

  				</div>

  			</div>

  		</div>
  	</div>



  </form>
  <!-- FORM END-->

</section><!-- Formu yazacağımız ikinci alan son -->

</div><!-- class: content-wrapper son -->
</div> <!-- class: wrapper son -->


</body>
</html>

<!--Kaba değerlendirme tablo animasyonu js si -->




<!-- Seymanın Ekledikleri BepKomısyonu multi-select-input START-->
<script>
	$(document).ready(function(){
		$('#framework').multiselect({
			nonSelectedText: 'Ders seçiniz',
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			buttonWidth:'400px'
		});

		$('#framework1').multiselect({
			nonSelectedText: 'Değerlendiren üyesi seçiniz',
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			buttonWidth:'400px'
		});

		$('#KABForm').on('submit', function(event){
			event.preventDefault();
		});

		$('#degerlendir').on('click', function(){
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
					url:"kaba_degerlendirme_verileri_cek.php",
					method:"POST",
					data:{dersler_id:dersler_id,komisyon_id:komisyon_id,id:id},
					success:function(data)
					{
						$("#kazanimlar").html(data);
					}
				});
			}
		});
	});
</script>



<?php  }
else{
	header("location: ../index.php");
}
unset($_SESSION['successErr']);
$conn = null;
exit();
?>