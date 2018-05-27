<?php 
/*
echo "ad";
try {
	if(isset($_GET['id'])){
		require_once '../connectDB.php';		
		$conn = null;

	}
	else{
		echo "ID Boş";
		header("location: personel_main_page.php");
		exit();
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
exit();
*/


session_start();
if($_SESSION['access_type'] == 'personel'){


	try {
		require_once '../connectDB.php';

		$studentID = $_GET['id'];

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

			<title></title>
			<style>
			table.distance {
				border: 1px solid black;
				margin-right: 20px;
				margin-left: 20px;
				padding-right: 20px;
				padding-left: 20px;

			}
		</style>
	</head>
	<body>
		<div class="contentwrapper"> 
			<div class="row">
				<div class="col-md-12">
					<section class="content-header">

						<div style="text-align: center;">
							<h3 style="color:#000;">Özel Albatros Özel Eğitim ve Rehabilitasyon Derneği <br>Kaba Değerlendirme</h3>
						</div>
					</section>

					<table id="öğrenciVeriTableID" class="table table-bordered distance">
						<thead>
							<tr><th>Özel Öğrenme Güçlüğü Eğitim Programı</th>
								<th>Kaba Değerlendirme</th></tr>

								<tr>
									<th>İsim</th>
									<th>Soyisim</th>
									<th>Sınıf</th>
									<th>Doğum tarihi</th>
									<th>Değerlendirme tarihi</th>
								</tr>
							</thead>
							<tbody id="tbody">

								<tr>;
									<td class='isim'></td>
									<td class='soyisim'></td>
									<td></td>
									<td></td>
									<td></td>

								</tr>

							</tbody>
						</table>
						<table id="kazanimlar" class="table table-bordered table-hover table-striped table-condens distance">
							<thead>
								<tr>
									<th>Kazanımlar</th>
									<th>Evet</th>
									<th>Hayır</th>
									<th>Açıklama</th>

								</tr>
							</thead>
							<tbody id="tbody">

								<tr>;
									<td class='isim'></td>
									<td class='soyisim'></td>
									<td></td>
									<td></td>

								</tr>

							</tbody>
						</table>
					</div>
				</div>										 	
			</div>
		</body>
		</html>
		<?php 

		$conn = null;
	} catch (Exception $e) {
		echo $e->getMessage();
		header("location: personel_main_page.php");
	}

}else{
	header("location: ../index.php");
	
}
exit();
?>

