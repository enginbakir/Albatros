<?php 
require_once "../connectDB.php";
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
	<div class="wrapper">
		<!--Main Page Header -->
		<?php include 'header.php'; ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php include 'personelPageSidebar.php'; ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Öğrenci Bilgileri</h1>
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
								<!-- BOX Kişi Bilgi Tablosu START-->
								<div class="box">
									<div class="box-header">
										<h3 id="studentInfoTitle" class="box-title">Öğrenci - Bilgileri</h3>
									</div>

									<div class="box-body" style="padding-right: 20px; padding-left: 20px;">
										<div class="row">
											<ul class="nav nav-tabs">
												<li class="active"><a data-toggle="tab" href="#home">Devamsızlık Takvimi</a></li>
												<li><a data-toggle="tab" href="#menu1">Ödeme Bilgileri</a></li>
											</ul>

											<div class="tab-content">

												<!-- Page- ÖDEME BİLGİLERİ START -->
												<div id="menu1" class="tab-pane fade">
													<div class="row">
														<div class="col-md-12">
															<table id="öğrenciOdemeTableID" class="table table-bordered table-hover">
																<thead>
																	<tr>
																		<th>Aylar</th>
																		<th>Ödeme Bilgisi</th>
																	</tr>
																</thead>
																<tbody >
																	<?php
																	$datam = mysqli_query($conn,"SELECT * FROM odeme_bilgileri ");


																	
																	while($write = mysqli_fetch_array($datam, MYSQL_ASSOC)){ ?>
																	<tr>
																		<td class="aylar">
																			<?php echo $write['aylar']; ?>
																		</td>
																		
																		<?php 
																		if($write['ödeme'] == 0) {
																			echo "<td id='odemeB' bgcolor='red'>Ödenmedi</td>";
																		} else{
																			echo "<td id='odemeB' bgcolor='#00f800'>Ödendi</td>";
																		}
																		?>
																	</tr>
																	<?php } ?>
																</tbody>
															</table>

															<div class="row" id="noo">
																
															</div>
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
				</section>


			</div>
			<!-- Content Wrapper END-->

		</div>

	</body>

	</html>


	<script>
		var id;
		function selectedOdemeRow(){
			var indexO, ay, odemeBilgisi;
			table = document.getElementById("öğrenciOdemeTableID");

			for(var i = 1; i < table.rows.length; i++)
			{
				table.rows[i].onclick = function()
				{
                         // remove the background from the previous selected row
                         if(typeof index !== "undefined"){
                         	table.rows[index].classList.toggle("selected");
                         }

                        // get the selected row index
                        indexO = this.rowIndex;
                        // add class selected to the row
                        $('.selected').removeClass('selected');
                        $(this).addClass("selected");
                        ay = $('.aylar',this).html();
                        odemeBilgisi =$('#odemeB',this).html();


                        $.ajax({  
                        	url:"getodeme.php",  
                        	method:"GET",  
                        	data:{'id':indexO},  
                        	success:function(data){ 

                        		$('#noo').html(data);  
                        	}  
                        });
                        
                    };
                }
            }

            selectedOdemeRow();

        </script>


