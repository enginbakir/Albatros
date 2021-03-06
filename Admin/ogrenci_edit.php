<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Albatros | Admin - Öğrenciler - Düzenleme</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/myCss.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include '/header.php'; 
		include '/sidebar.php'; ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
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

								<form class="form-inline" action="/action_page.php" style="padding-bottom: 10px">
									<div class="form-group">
										<label for="">Adı:</label>
										<input type="text" class="form-control" id="adi" placeholder="Personelin Adı" name="Personel adı">
									</div>
									<div class="form-group">
										<label for="">Soyadı:</label>
										<input type="text" class="form-control" id="soyadi" placeholder="Personelin Soyadı" name="Personel Soyad">
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
														<th>Ünvan</th>
														<th>Telefon</th>                              
													</tr>
												</thead>
												<tbody id="tbody">


													<?php 

													require_once "connectDB.php";

													$name;
													$surname;
													if(isset($_POST['firstname']) && !empty($_POST['firstname']))
														$name = $_POST['firstname'];
													if(isset($_POST['surname']) && !empty($_POST['surname']))
														$surname = $_POST['surname'];    

													if(isset($name) && isset($surname)){
														$sql = "SELECT * FROM personel where name='".$name."' and surname=' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK".$surname."';";
													}
													if(isset($name) && !isset($surname)){
														$sql = "SELECT * FROM personel where name='".$name."' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK;";
													}
													if(!isset($name) && isset($surname)){
														$sql = "SELECT * from personel where surname='".$surname."' INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK;";
													}
													if (!isset($name) && !isset($surname)) {
														//$sql = "SELECT * FROM personel ";
														$sql = "select * from personel INNER JOIN personel_types on personel.personel_type_FK=personel_types.personel_type_PK";
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

														echo "<td class='id'>".$row['personel_PK']."</td>";
														echo "<td class='isim'>".$row['name']."</td>";
														echo "<td class='soyisim'>".$row['surname']."</td>";
														echo "<td class='unvan'>".$row['personel_type']."</td>";
														echo "<td class='tel_no'>".$row['tel_no']."</td>";

														echo "</tr>";
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
										<button type="button" class="btn btn-primary">&nbsp;&nbsp;Düzenle&nbsp;&nbsp;</button>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-primary">&nbsp;&nbsp;Yenile&nbsp;&nbsp;</button>
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
								<h3 class="box-title">Gülben Ergül - Bilgileri</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
								<div class="row">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">Personel Bilgileri</a></li>
										<li><a data-toggle="tab" href="#menu1">Mail</a></li>
										<li><a data-toggle="tab" href="#menu2">Takvim</a></li>
									</ul>

									<div class="tab-content">	
										<div id="home" class="tab-pane fade in active">
											<div class="box box-primary">
												<div class="box-body box-profile">
													<img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar2.png" alt="User profile picture">

													<h3 class="profile-username text-center">Gülben Ergül</h3>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>TC</b> <a class="pull-right">20154895748</a>
														</li>
														<li class="list-group-item">
															<b>Adres</b> <a class="pull-right">Lorem ipsum dolor sit amet, consectetur.</a>
														</li>                  
														<li class="list-group-item">
															<b>Ünvan</b> <a class="pull-right">MATEMATİK ÖĞRETMENİ</a>
														</li>
														<li class="list-group-item">
															<b>Mail</b> <a class="pull-right">glb_ergül@yahoo.com</a>
														</li>
														<li class="list-group-item">
															<b>Kayıt Tarihi</b> <a class="pull-right">18.09.2017</a>
														</li>
														<li class="list-group-item">
															<b>Ayrılış Tarihi</b> <a class="pull-right">-</a>
														</li>
													</ul>
												</div>
												<!-- /.box-body -->
											</div>
										</div>

										<div id="menu1" class="tab-pane fade">
											<div class="col-md-12">
												<div class="box box-primary">
													<div class="box-header with-border"><h3 class="box-title">Compose New Message</h3></div>
													<!-- /.box-header -->
													<div class="box-body">
														<div class="form-group"><input class="form-control" placeholder="To: glb_ergül@yahoo.com"></div>
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
															</ul><textarea id="compose-textarea" class="form-control" style="height: 300px; display: none;">             &lt;h1&gt;&lt;u&gt;Heading Of Message&lt;/u&gt;&lt;/h1&gt;
																&lt;h4&gt;Subheading&lt;/h4&gt;
																&lt;p&gt;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
																was born and I will give you a complete account of the system, and expound the actual teachings
																of the great explorer of the truth, the master-builder of human happiness. No one rejects,
																dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
																how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
																is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain.
																&lt;/p&gt;
																&lt;ul&gt;
																&lt;li&gt;List item one&lt;/li&gt;
																&lt;li&gt;List item two&lt;/li&gt;
																&lt;li&gt;List item three&lt;/li&gt;
																&lt;li&gt;List item four&lt;/li&gt;
																&lt;/ul&gt;
																&lt;p&gt;Thank you,&lt;/p&gt;
																&lt;p&gt;John Doe&lt;/p&gt;
															</textarea><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(85, 85, 85) none 0px; outline-offset: 0px; padding: 6px 12px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 100px;"></iframe>
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

										<div id="menu2" class="tab-pane fade">
											<div class="col-md-12">
												<div class="box box-primary">
													<div class="box-body no-padding">
														<!-- THE CALENDAR -->

														<div id="calendar" class="takvim calendar fc fc-unthemed fc-ltr"><input type="text" name="date" id="selectedDate" value="" style="display: none;"></div>
														<button id="showDate" type="button" class="btn btn-primary">&nbsp;&nbsp;Show Date&nbsp;&nbsp;</button>
														<div class="control-sidebar-bg"></div>
													</div>
												</div>
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



</body>
</html>