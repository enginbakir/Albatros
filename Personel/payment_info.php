<?php 
require_once "../connectDB.php";

// include('database_connection.php');

// $student_id = $_POST['id'];
$student_id = 1;

$aylar = '';

$query = "SELECT aylar FROM odeme_aylar GROUP BY aylar ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute(); 

$result = $statement->fetchAll();

foreach($result as $row)
{
	$aylar .= '<option value="'.$row["aylar"].'">'.$row["aylar"].'</option>';
}


///////////////////////////////////////////////////////////////////////////////////////////////

$o_b  = '';

$query2 = "SELECT bilgiler FROM odeme_bilgileri ";

$statement2 = $connect->prepare($query2);

$statement2->execute();

$result2 = $statement2->fetchAll();

foreach($result2 as $row2)
{
	$o_b .= '<option value="'.$row2["bilgiler"].'">'.$row2["bilgiler"].'</option>';
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

	<!-- Font Awesome -->
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
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
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- MultiSelect.css -->
	<link href="path/to/multiselect.css" media="screen" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="../dist/css/skins/jquery.lwMultiSelect.css"> -->
	<!-- jQuery 3 -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
	<!-- MultiSelect.js -->
	<script src="../dist/js/jquery.lwMultiSelect.js"></script>

	<style>

	tr{cursor: pointer; transition: all .25s ease-in-out}
	.selected{background-color: blue;  color: #fff;}

	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>td{
		border: 1px solid #51bcdc;
		font-size:18px }
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
								<!-- BOX Öğrenci Veri Tablosu START-->
								<div class="box">
									<div class="box-header">
										<h3 class="box-title">Öğrenci Veri Tablosu</h3>
									</div>

									<div class="box-body">
										<!--FORM1 Öğrenci Veri Tablosu START-->
										<form class="form-inline" action="" style="padding-bottom: 10px">
											<!--Content wrapper START-->
											<div class="contentwrapper" > 

												<div class="form-group">
													<label for="email">Adı:</label>
													<input type="text" class="form-control" id="adi" placeholder="Öğrencinin Adı" name="Öğrenci adı">

													<label for="pwd">Soyadı:</label>
													<input type="text" class="form-control" id="soyadi" placeholder="Öğrencinin Soyadı" name="Soyad">

													<button type="submit" class="btn btn-primary">Listele</button>
												</div>

											</div>
											<!--Content wrapper END-->
										</form>
										<!--FORM1 Öğrenci Veri Tablosu END-->

										<!--FORM2 Öğrenci Veri Tablosu START-->
										<form class="form-inline" action=""  style="padding-bottom: 10px">
											<!--Content wrapper START-->
											<div class="contentwrapper" > 
												<div class="row">
													<div class="col-md-12">
														<table id="öğrenciVeriTableID" class="table table-bordered ">
															<thead>
																<tr>
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
																$sql = 'SELECT S.student_PK, S.name, S.surname, G.gender_type FROM gender G, student S WHERE S.gender_FK = G.gender_PK';

																if ($result = mysqli_query($conn, $sql)) {
																	while ($array = mysqli_fetch_array($result, MYSQL_ASSOC)) {
																		echo "<tr scope='row1'>";
																		echo "<td class='id'>" .$array['student_PK']. "</td>";
																		echo "<td class='isim'>" .$array['name']. "</td>";
																		echo "<td class='soyisim'>" .$array['surname']. "</td>";
																		echo "<td>" .$array['gender_type']. "</td>";
																		echo "<td>" ." ". "</td>";
																		echo "<td>" ." ". "</td>";
																		echo "</tr>";
																	}   

																}
																else{
																	echo "baglantı yok!";
																}

																?>

															</tbody>
														</table>
													</div>
												</div>										 	
											</div>
											<!--Content wrapper END-->
										</form>
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

										<!-- Page- ÖDEME BİLGİLERİ START -->
										<div class="row">
											<div class="col-md-12">
												<div class="container" style="width:600px;" >
													<!-- <h2 align="center">Ödeme Deneme 2</h2><br /><br /> -->
													<form method="post" id="insert_data">
														<?php echo '<input type="text" name="student_id" id="student_id" style="display: none;" value = '.$student_id.'>';  ?>
														<!-- <input type="text" name="student_id" id="student_id" style="display: none;" value="<?php //echo $idtest; ?>" > -->
														<select name="aylar" id="aylar" class="form-control action">
															<option disabled="disabled" selected="selected">Ay Seçiniz...</option>
															<?php echo $aylar; ?>
														</select>
														<br />
														<select name="date_odeme" id="date_odeme" multiple class="form-control">
														</select>
														<br />
														<select name="odeme_bilgisi" id="odeme_bilgisi" class="form-control action">
															<option disabled="disabled" selected="selected" value="">Ödeme Bilgisini Seçiniz...</option>
															<?php echo $o_b; ?>
														</select>
														<br />
														<input type="hidden" name="hidden_date_odeme" id="hidden_date_odeme" />
														<input type="submit" name="insert" id="action" class="btn btn-info" value="Insert" />
													</form>
												</div>
												<!-- <br />
												<div id="payment_info">

												</div> -->
											</div>
										</div>
										<!-- Page-ÖDEME BİLGİLERİ END -->

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
		$(document).ready(function(){

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
				// $('#odeme_bilgisi').val();
				var form_data = $(this).serialize();
				$.ajax({
					url:"payment_insert.php",
					method:"POST",
					data:{odeme_bilgisi:odeme_bilgisi,aylar:aylar,dates:dates},
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

		});
	</script>

	<!-- To Change Selected HTML Table Row Background Color START-->
	<script>
		var id;
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

                        // $.ajax({  
                        // 	url:"payment_page.php",  
                        // 	method:"POST",  
                        // 	data:{id:id},
                        // 	success:function(data){ 
                        // 		$('#payment_info').html(data);  
                        // 	}  
                        // });  
                        document.getElementById("studentInfoTitle").innerHTML = isim+" "+soyisim+" Bilgileri";
                    };
                }

                
            }

            selectedRow();

        </script>
        <!-- To Change Selected HTML Table Row Background Color END-->


