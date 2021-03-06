
<?php session_start();
if($_SESSION['access_type'] == "admin"){ 
	require_once '../connectDB.php';
	$id = $_GET["id"];
	$sql = "SELECT * FROM student where student_PK = $id";

	$row = $conn->query($sql, PDO::FETCH_ASSOC)->fetch();

	$veliQuery = "SELECT * from parent where student_FK = $id";
	$veliRow = $conn->query($veliQuery,PDO::FETCH_ASSOC)->fetch();
	if($veliRow === false) {
		die('Could not get data: ');
	}
	
	?>  

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Albatros | Admin - Öğrenciler - Düzenleme</title>
		<!-- Tell the browser to be responsive to screen width -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>



		<!-- Import google fonts - Heading first/ text second -->
		<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="../dist/css/main.css">
		<link rel="stylesheet" href="../dist/css/plugins.css">
		<link rel="stylesheet" href="../dist/css/custom.css">
		<link rel="stylesheet" href="../dist/css/bootstrap.css">
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
  <!--[if lt IE 9]>/albatros/
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
			<section class="content-header">
				<h1 style="color:#000">
					Öğrenci Düzenle
					<small>...........</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="admin.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>

					<li><a href="ogrenci.php">Öğrenciler</a></li>
					<li class="active">Düzenle</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">


						<!--  FORM   -->

						<form id="updateStudentForm" action="updateStudent.php" method="post" enctype="multipart/form-data">

							<!--  FORM  -->

							<!-- this input will be used to post student_PK to updateStudent.php page -->
							<input name="student_PK" type="text" maxlength="11" class="form-control" placeholder="Sabit Telefon" style="display: none" <?php echo " value = '".$row["student_PK"]."'"; ?> >
							<!-- this input will be used to post student_PK to updateStudent.php page -->
							
							<div class="panel panel-default  toggle panelMove panelRefresh" id="supr0">
								<div class="panel-heading">
									<h4 class="panel-title">Öğrenci Bilgileri</h4>
									<span class="error bigfont">
										<?php if(isset($_SESSION["connection"]))
										echo "Veritabanı Bağlantı Hatası";
										echo $_SESSION["errorMessage"];
										?>

									</span>

								</div>
								<div class="panel-body pt0 pb0">
									<div class="form-horizontal group-border stripped">
										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label" for="">Dönem Başlangıç Tarihi:</label>
												<div class="col-md-3">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														<span class="error"><?php echo $_SESSION["donemBaslangicTarihi"]; ?></span>

														<input name="donemBaslangicTarihi" class="form-control" type="date" data-date-inline-picker="false" data-date-open-on-focus="false" value = <?php echo $row['term_start_date']; ?> >

													</div>
												</div>
												<label class="col-md-2 control-label" for="">Dönem Bitiş Tarihi:</label>
												<div class="col-md-3">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														<span class="error"><?php echo $_SESSION["donemBitisTarihi"]; ?></span>

														<input name="donemBitisTarihi" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false" value = <?php echo $row['term_finish_date']; ?> >

													</div>
												</div>
											</div>
										</div>
										<!-- End .form-group 1 -->

										<!-- Start .form-group 2 -->
										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label"><i class="renk">&nbsp;</i>Adı:</label>
												<div class="col-md-3">

													<input name="studentName" type="text" maxlength="64" id="ContentPlaceHolder1_txtAdi" class="form-control" placeholder="Öğrenci Adı"  <?php echo " value = '".$row['name']."'"; ?> />

													<span class="error">* <?php echo $_SESSION["nameErr"];?></span>
												</div>
												<label class="col-md-2 control-label"><i class="renk">&nbsp;</i>Soyadı:</label>
												<div class="col-md-3">

													<input name="studentSurname" type="text" maxlength="64" id="ContentPlaceHolder1_txtSoyadi" class="form-control" placeholder="Öğrenci Soyadı"<?php echo " value = '".$row['surname']."'"; ?> />

													<span class="error">* <?php echo $_SESSION["surNameErr"];?></span>
												</div>
											</div>
										</div>
										<!-- End .form-group 2 -->

										<!-- Start .form-group 3 -->
										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label">Cinsiyet:</label>
												<div class="col-md-3">    
													<div class="fancy-select">

														
														<?php 
														echo '<select name="gender" id="Cinsiyet" class="fancy-select form-control fancified" >';

														if($row['gender_FK'] == "1"){
															echo '<option value = "KIZ">KIZ</option>';
															echo '<option value = "ERKEK">ERKEK</option>';
														}
														else{
															echo '<option value = "ERKEK">ERKEK</option>';
															echo '<option value = "KIZ">KIZ</option>';
														}

														echo '</select>';
														
														?>

													</div> 
												</div>
												<label class="col-md-2 control-label">T.C. No:</label>
												<div class="col-md-3">

													<input name="TCNumber" type="text" maxlength="11" id="ContentPlaceHolder1_txtTC" class="form-control" placeholder="T.C. Kimlik No" value = <?php echo $row['tc_no']; ?>>

													<span class="error"><?php echo $_SESSION["TCNumberErr"];?></span>
												</div>                          
											</div>
										</div>

										<!-- End .form-group 3 -->

										<!-- Start .form-group 4 -->

										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label">Sınıfı:</label>
												<div class="col-md-3">

													<input name="studentClass" type="text" maxlength="8" id="ContentPlaceHolder1_txtSinif" class="form-control" placeholder="Sınıfı" value = <?php echo $row['class']; ?>>
												</div>
												<label class="col-md-2 control-label">Rapor No:</label>
												<div class="col-md-3">
													<input name="studentRapor" type="text" maxlength="16" id="ContentPlaceHolder1_txtRapor" class="form-control" placeholder="Rapor No" value = <?php echo $row['rapor_no']; ?>>

												</div>
											</div>
										</div>
										<!-- End .form-group 4 -->

										<!-- Start .form-group 4 -->
										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label" for="">Doğum Tarihi:</label>
												<div class="col-md-3">
													<div class=" input-group">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>

														<input name="studentBirthDay" class="form-control"  type="date" data-date-inline-picker="false" data-date-open-on-focus="false" value = <?php echo $row['birthday']; ?>>

													</div>
												</div>
												<label class="col-md-2 control-label" for="">Kayıt Tarihi:</label>
												<div class="col-md-3">
													<div class=" input-group">

														<input name="registrationDate" type="text" maxlength="10" id="registrationDate" class="form-control" placeholder="yyyy-aa-gg" readonly value = <?php echo $row['registration_date']; ?> >

													</div> 
												</div>
											</div>
										</div>

										<!-- Start .form-group 5 -->

										<!-- End .form-group 5 -->

										<!---- FOTOĞRAF -->

										<div class="form-group">
											<label class="col-md-2 control-label" for="">Fotoğraf Seç:</label>
											<div class="col-md-3">
												<span class="error">
													<?php 
													for($temp; $temp < 5;$temp++){
														if(!empty($_SESSION["fileErrors"][$temp]))
															echo $_SESSION["fileErrors"][$temp]." "; 
													}
													?>
												</span>


												<input type="file" name="fileToUpload" class="btn btn-default btn-file" >
												<img id = "ogrenciPhoto" class="profile-user-img img-responsive img-circle" src=<?php echo $row['photo']; ?> alt="User profile picture">

											</div>
											<label class="col-md-2 control-label" for="">Ulaşım:</label>
											<div class="col-md-3">
												<select name="transportation" id="transportation" class="fancy-select form-control fancified" >
													<option value="Servis">Servis</option>
													<option value="Veli">Veli</option> 
													<option value="Diğer">Diğer</option>
												</select>
											</div>
										</div>

										<!---- FOTOĞRAF -->

										<!-- Start .form-group 6 -->
										<div class="form-group">
											<label class="col-md-2 control-label" for="">Reh. Araş. Merkezi:</label>
											<div class="col-md-3">


												<input name="rehberlikMerkezi" type="text" maxlength="255" id="ContentPlaceHolder1_txtMerkezi" class="form-control" <?php echo " value = '".$row['rehberlik_merkezi']."'"; ?> >


											</div>

											<label class="col-md-2 control-label"><i class="renk"><span class="error">*</span>&nbsp;</i>Eğitsel Tanı:</label>
											<span class="error"><?php echo $_SESSION["educationalDiagnosisErr"]; ?></span>

											<span class="error">Tüm Tanıları Baştan Seçiniz</span>

											<div class="col-md-4">

												<div class="form-group">

													<select id="framework" name="framework[]" multiple class="form-control" >
														<option value="Hafif Düzey Zihinsel Yetersizlik (HDZY)">Hafif D&#252;zey Zihinsel Yetersizlik (HDZY)</option>
														<option value="Orta Düzey Zihinsel Yetersizlik (ODZY)">Orta D&#252;zey Zihinsel Yetersizlik (ODZY)</option>
														<option value="Ağır Düzey Zihinsel Yetersizlik (ADZY)">Ağır D&#252;zey Zihinsel Yetersizlik (ADZY)</option>
														<option value="Çok Ağır Düzey Zihinsel Yetersizlik (CADZY)">&#199;ok Ağır D&#252;zey Zihinsel Yetersizlik (CADZY)</option>
														<option value="Bedensel Yetersizlik">Bedensel Yetersizlik</option>
														<option value="Görme Yetersizliği">G&#246;rme Yetersizliği</option>
														<option value="Duygusal Davranış Bozukluğu (DDB)">Duygusal Davranış Bozukluğu (DDB)</option>
														<option value="Yaygın Gelişimsel Bozukluk (OTİZM)">Yaygın Gelişimsel Bozukluk (OTİZM)</option>
														<option value="Özel Öğrenme Güçlüğü (ÖÖG)">&#214;zel &#214;ğrenme G&#252;&#231;l&#252;ğ&#252;(&#214;&#214;G)</option>
														<option value="Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)">Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)</option>
														<option value="Dil Konuşma Güçlüğü (DKG)">Dil Konuşma G&#252;&#231;l&#252;ğ&#252; (DKG)</option>
														<option value="Üstün Yetenekli Birey (ÜYB)">&#220;st&#252;n Yetenekli Birey (&#220;YB)</option>
														<option value="İşitme Yetersizliği">İşitme Yetersizliği</option>
														<option value="Normal">Normal</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-md-2 control-label" for="">Öğretmen Seç:</label>
												<div class="col-md-3">
													<div class="form-group">                                                   

														<?php 

														$sql = "SELECT * FROM personel";

														echo '<select id="ogretmen" name="ogretmen" class="fancy-select form-control fancified" >';
														foreach ($conn->query($sql) as $row) {
															echo "<option value='".$row['personel_PK']."'>".$row['personel_PK']." ".$row['name']."</option>";
														}
														echo "</select>";

														?>

													</div>

												</div>

												<label class="col-md-2 control-label" for=""></label>
												<div class="col-md-3"></div>
											</div>
										</div>

										<!-- End .form-group 6 -->
									</div>
								</div>
							</div>
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
													<label class="col-md-2 control-label" for=""><i class="renk">&nbsp;</i>Adı:</label>
													<div class="col-md-3">

														<input name="parentName" type="text" maxlength="64" id="parentName" class="form-control" placeholder="Velinin Adı" <?php echo " value = '".$veliRow['name']."'"; ?>>

														<span class="error">* <?php echo $_SESSION["parentNameErr"]; ?></span>
													</div>

													<label class="col-md-2 control-label" for=""><i class="renk">&nbsp;</i>Soyadı:</label>
													<div class="col-md-3">

														<input name="parentSurname" type="text" maxlength="64" id="parentSurname" class="form-control" placeholder="Velinin Soyadı" <?php echo " value = '".$veliRow['surname']."'"; ?>>

														<span class="error">* <?php echo $_SESSION["parentSurnameErr"]; ?></span>
													</div>
												</div>
											</div>
											<!-- End .form-group  -->

											<div class="form-group">
												<div class="row">
													<label class="col-md-2 control-label">T.C. No:</label>
													<div class="col-md-3">

														<input name="parentTCNumber" type="text" maxlength="11" id="parentTCNumber" class="form-control" placeholder="TC Kimlik No" <?php echo " value = '".$veliRow['tc_no']."'" ?>>

														<span class="error"><?php echo $_SESSION["parentTCNumberErr"] ?></span>
													</div>
													<label class="col-md-2 control-label" for="">Yakınlık Derecesi:</label>
													<div class="col-md-3">              
														<div class="fancy-select">
															<select name="parentYakinlik" id="Yakinlik" class="fancy-select form-control fancified">
																<option value="Anne">Anne</option>
																<option value="Baba">Baba</option>
																<option value="Diğer">Diğer</option>
															</select>
														</div> 
													</div>
												</div>
											</div>



											<!-- End .form-group  -->

											<div class="form-group">
												<div class="row">

													<label class="col-md-2 control-label">Sabit Telefon:</label>
													<div class="col-md-3">

														<input name="parentPhoneNumber" type="text" maxlength="11" id="SabitTel" class="form-control" placeholder="Sabit Telefon" <?php echo " value = '".$veliRow['sabit_tel']."'" ?>>

														<span class="error"><?php echo $_SESSION["parentPhoneNumberErr"] ?></span>
													</div>
													<label class="col-md-2 control-label">Cep Telefonu:</label>
													<div class="col-md-3">


														<input name="parentMobilePhone" type="text" maxlength="11" id="CepTel" class="form-control" placeholder="Cep Telefonu" <?php echo " value = '".$veliRow['tel_no']."'" ?>>

														<span class="error"><?php echo $_SESSION["parentMobilePhoneErr"] ?></span>
													</div>

												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="">Email Adresi:</label>
												<div class="col-md-8">

													<input name="emailAdresi" type="text" maxlength="255" id="emailAdresi" class="form-control" placeholder="Email Adresi" <?php echo " value = '".$veliRow['email_adress']."'" ?>>

												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="">Ev Adresi:</label>
												<div class="col-md-8">

													<input name="evAdresi" type="text" maxlength="255" id="EvAdresi" class="form-control" placeholder="Ev Adresi" <?php echo " value = '".$veliRow['adress']."'" ?>>

												</div>
											</div>
											<!-- End .form-group  -->

											<div class="form-group">
												<label class="col-md-2 control-label" for="">İş Adresi:</label>
												<div class=" col-md-8">

													<input name="parentIsAdresi" type="text" maxlength="255" id="IsAdresi" class="form-control" placeholder="İş Adresi" <?php echo " value = '".$veliRow['work_adress']."'" ?>>

												</div>
											</div>
											<!-- End .form-group  -->
											<div class="form-group">
												<label class="col-md-2 control-label" for="">Açıklama:</label>
												<div class="col-md-8">

													<textarea name="Aciklama" rows="2" cols="20" id="Aciklama" class="form-control" <?php echo " value = '".$veliRow['description']."'" ?> ></textarea >

												</div>
											</div>

											<!-- End .form-group  -->
										</div>

										<!--<button type="submit" id="sub" class="btn btn-success mr5 mb10">Kaydet Button</button> -->
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">  
													<input type="submit" id="sub" value="Kaydet" class="btn btn-success">  

													<a href="ogrenci.php" class="btn btn-success" role="button">İptal</a>

												</div>
											</div>
										</div> 

									</div>
									<span class="error"><i>* ile işaretli alanların doldurulması zorunludur!</i></span> 

									<!-- End of Panel -->
								</div>
							</div>


						</form>
					</div>

				</div>
			</section>

		</div>

		<?php require_once 'footer.php'; ?>

	</div>


	<div>
		<script>
			$(document).ready(function(){
				$('#framework').multiselect({
					nonSelectedText: 'Tanı Seç',
					enableFiltering: true,
					enableCaseInsensitiveFiltering: true,
					buttonWidth:'300px'
				});

			});
		</script>

	</div>

</body>

</html>

<?php 

unset($_SESSION['errorMessage']); 
unset($_SESSION["nameErr"]);
unset($_SESSION["surNameErr"]);
unset($_SESSION["TCNumberErr"]);
unset($_SESSION["TCNumberErr"]);
unset($_SESSION["fileErrors"]);
unset($_SESSION["educationalDiagnosisErr"]);
unset($_SESSION["parentNameErr"]);
unset($_SESSION["parentSurnameErr"]);
unset($_SESSION["parentTCNumberErr"]);
unset($_SESSION["parentPhoneNumberErr"]);
unset($_SESSION["parentMobilePhoneErr"]);
unset($_SESSION["donemBitisTarihi"]);
unset($_SESSION["donemBaslangicTarihi"]);

}
else{

	header("location: ../index.php");
	exit();
}?>

