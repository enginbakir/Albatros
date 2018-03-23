<?php 
require_once "connectDB.php";


function fill_notes($conn){
	$output = '';
	$sql  = 'SELECT P.personel_Pk,note,tarih FROM Personel P,`note` WHERE student_PK = 320';
	$result = mysqli_query($conn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{  
		$output .= '<option value="'.$row["brand_id"].'">'.$row["brand_name"].'</option>';

		$output .="<tr><td>".$row[""]."</td>
		<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
		<td>13:30</td>
		</tr>";
	}  
	return $output;  
}


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
										<label for="email">Adı:</label>
										<input type="text" class="form-control" name="firstname" id="adi" placeholder="Öğrencinin Adı" name="Öğrenci adı">
									</div>
									<div class="form-group">
										<label for="pwd">Soyadı:</label>
										<input type="text" class="form-control" name="surname" id="soyadi" placeholder="Öğrencinin Soyadı" name="Soyad">
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
															$sql = "SELECT student_PK,name,surname FROM student where name='".$name."' and surname='".$surname."';";
														}
														if(isset($name) && !isset($surname)){
															$sql = "SELECT student_PK,name,surname FROM student where name='".$name."';";
														}
														if(!isset($name) && isset($surname)){
															$sql = "SELECT student_PK, name, surname from student where surname='".$surname."';";
														}
														if (!isset($name) && !isset($surname)) {
															$sql = "SELECT student_PK,name,surname FROM student ";
														}
														unset($_POST['firstname']);
														unset($_POST['surname']);

														$retval = mysqli_query( $conn, $sql );

														$num_rows = mysqli_num_rows($retval);
														if(! $retval ) {
															die('Could not get data: ' . mysqli_error());
														}

														while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
															echo "<tr>";

															echo "<td class='id'>".$row['student_PK']."</td>";
															echo "<td class='isim'>".$row['name']."</td>";
															echo "<td class='soyisim'>".$row['surname']."</td>";

															echo "<td>Erkek</td>
															<td>3</td>
															<td>0</td>";

															echo "</tr>";
														}

														?>

													</tbody>
												</table>
											</div>

											<div class="col col-s-6"> <?php echo "<br>Kayıtlı Öğrenci Sayısı: ".$num_rows ?>
											</div>
											<div class="col col-xs-8">
												<ul class="pagination hidden-xs pull-right">
													<?php
													mysqli_close($conn); ?>
												</div>
											</div>
										</div>      
										<div class="btn-group btn-group-justified" style="padding-bottom: 10px">
											<div class="btn-group">
												<a href="ogrenci_ekle.php" class="btn btn-primary" role="button">&nbsp;&nbsp;Ekle&nbsp;&nbsp;</a></div>
												<div class="btn-group">
													<button id="silButton" type="button" class="btn btn-primary">&nbsp;&nbsp;Sil&nbsp;&nbsp;</button></div>
													<div class="btn-group">
														<a href="ogrenci_düzenle.php" class="btn btn-primary" role="button">&nbsp;&nbsp;Düzenle&nbsp;&nbsp;</a></div>
														<div class="btn-group">
															<button type="button" class="btn btn-primary">&nbsp;&nbsp;Yenile&nbsp;&nbsp;</button></div>
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
														<h3 id="studentInfoTitle" class="box-title"> Öğrenci Bilgileri</h3>
													</div>
													<!-- /.box-header -->
													<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
														<div class="row">
															<ul class="nav nav-tabs">
																<li class="active"><a data-toggle="tab" href="#home">Notlar</a></li>
																<li><a data-toggle="tab" href="#menu1">Veli Bilgileri</a></li>
																<li><a data-toggle="tab" href="#menu2">Öğrenci Bilgileri</a></li>
																<li><a data-toggle="tab" href="#menu3">Takvim</a></li>
																<li><a data-toggle="tab" href="#menu4">Mail</a></li>
															</ul>

															<div class="tab-content">
																<div id="home" class="tab-pane fade in active">
																	<div class="row">
																		<div class="col-md-12" style="margin-bottom: 10px;">
																			<table id="example23" class="table table-bordered table-hover">
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
																<div id="menu2" class="tab-pane fade">
																	<div class="box box-primary">
																		<div class="box-body box-profile">
																			<img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar5.png" alt="User profile picture">

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
																		<!-- /.box-body -->
																	</div>
																</div>
																<div id="menu3" class="tab-pane fade">
																	<p>Takvim Menüsü</p>
																</div>
																<div id="menu4" class="tab-pane fade">
																	<div class="col-md-12">
																		<div class="box box-primary">
																			<div class="box-header with-border"><h3 class="box-title">Compose New Message</h3></div>
																			<!-- /.box-header -->
																			<div class="box-body">
																				<div class="form-group"><input class="form-control" placeholder="To: neriman_bkr@yahoo.com"></div>
																				<div class="form-group"><input class="form-control" placeholder="Subject:"></div>
																				<div class="form-group">
																					<ul class="wysihtml5-toolbar" style="">
																						<li class="dropdown">
																							<a class="btn btn-default dropdown-toggle " data-toggle="dropdown">
																								<span class="glyphicon glyphicon-font"></span>
																								<span class="current-font">Normal text</span>
																								<b class="caret"></b>
																							</a>
																							<ul class="dropdown-menu">
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" href="javascript:;" unselectable="on">Heading 4</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" href="javascript:;" unselectable="on">Heading 5</a></li>
																								<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" href="javascript:;" unselectable="on">Heading 6</a></li>
																							</ul>
																						</li>

																						<li>
																							<div class="btn-group">
																								<a class="btn  btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">B</a>
																								<a class="btn  btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">I</a>
																								<a class="btn  btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">U</a>
																								<a class="btn  btn-default" data-wysihtml5-command="small" title="CTRL+S" tabindex="-1" href="javascript:;" unselectable="on">S</a>
																							</div>
																						</li>

																						<li>
																							<div class="bootstrap-wysihtml5-insert-link-modal modal fade" data-wysihtml5-dialog="createLink">
																								<div class="modal-dialog ">
																									<div class="modal-content">
																										<div class="modal-header">
																											<a class="close" data-dismiss="modal">×</a>
																											<h3>Insert link</h3>
																										</div>
																										<div class="modal-body">
																											<div class="form-group">
																												<input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control" data-wysihtml5-dialog-field="href">
																											</div> 
																											<div class="checkbox">
																												<label> 
																													<input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window
																												</label>
																											</div>
																										</div>
																										<div class="modal-footer">
																											<a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
																											<a href="#" class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save">Insert link</a>
																										</div>
																									</div>
																								</div>
																							</div>
																							<a class="btn  btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">
																								<span class="glyphicon glyphicon-share"></span>
																							</a>
																						</li>

																						<li>
																							<div class="bootstrap-wysihtml5-insert-image-modal modal fade" data-wysihtml5-dialog="insertImage">
																								<div class="modal-dialog ">
																									<div class="modal-content">
																										<div class="modal-header">
																											<a class="close" data-dismiss="modal">×</a>
																											<h3>Insert image</h3>
																										</div>
																										<div class="modal-body">
																											<div class="form-group">
																												<input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control" data-wysihtml5-dialog-field="src">
																											</div> 
																										</div>
																										<div class="modal-footer">
																											<a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
																											<a class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save" href="#">Insert image</a>
																										</div>
																									</div>
																								</div>
																							</div>
																							<a class="btn  btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">
																								<span class="glyphicon glyphicon-picture"></span>
																							</a>
																						</li>
																					</ul>
																					<textarea id="compose-textarea" class="form-control" style="height: 200px;"></textarea>
																					<iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(85, 85, 85) none 0px; outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 100px; display:none;"></iframe>
																				</div>
																				<div class="form-group">
																					<div class="btn btn-default btn-file">
																						<i class="fa fa-paperclip"></i> Attachment
																						<input type="file" name="attachment">
																					</div>
																					<p class="help-block">Max. 32MB</p>
																				</div>
																			</div>
																			<!-- /.box-body -->
																			<div class="box-footer">
																				<div class="pull-right">
																					<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
																					<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
																				</div>
																				<button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
																			</div>
																			<!-- /.box-footer -->
																		</div>
																		<!-- /. box -->
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
								<script type="text/javascript">
									var id = -1;
									var isim; 
									var soyisim;
									/*$( document ).ready(function(){
										id = $("#tbody tr:first td:first").text();
										$.ajax({  
											url:"load_notes.php",  
											method:"POST",  
											data:{id:id},  
											success:function(data){  
												//alert(data);
												$('#notes').html(data);  
											}  
										});  
									})*/

									$("#tbody tr").click(function () {
										$('.selected').removeClass('selected');
										$(this).addClass("selected");
										id = $('.id',this).text();
										isim = $('.isim',this).text();
										soyisim = $('.soyisim',this).text();

										$.ajax({  
											url:"load_notes.php",  
											method:"POST",  
											data:{id:id},  
											success:function(data){  
												$('#notes').html(data);  
											}  
										});  

										document.getElementById("studentInfoTitle").innerHTML = isim+" "+soyisim+" Bilgileri";

										/*$.ajax({
											url : "öğrenci_bilgileri.php",
											method : "POST",
											data : {id:id},
											success:function(data){
											}
										});*/
										
									});

									$("#silButton").on("click",function(){

										if(id>0){
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
										if(id < 0)
											alert("Bir Kayıt Seçin!!!");
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