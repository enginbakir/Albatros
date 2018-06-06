<?php

require_once '../connectDB.php';

$student_id = $_POST['id'];

$aylar = '';

$query = "SELECT aylar FROM odeme_aylar GROUP BY aylar ORDER BY id";

$statement = $conn->prepare($query);

$statement->execute(); 

$result = $statement->fetchAll();

foreach($result as $row)
{
	$aylar .= '<option value="'.$row["aylar"].'">'.$row["aylar"].'</option>';
}


///////////////////////////////////////////////////////////////////////////////////////////////

$o_b  = '';

$query2 = "SELECT bilgiler FROM odeme_bilgileri ";

$statement2 = $conn->prepare($query2);

$statement2->execute();

$result2 = $statement2->fetchAll();

foreach($result2 as $row2)
{
	$o_b .= '<option value="'.$row2["bilgiler"].'">'.$row2["bilgiler"].'</option>';
}

?>

<style type="text/css">
	.selected{
		background-color: #f00;
		color: #fff;
	}
</style>

<br /><br />
<div class="container col-md-12">
	<!-- <h2 align="center">Ödeme Deneme 2</h2><br /><br /> -->
	<form method="post" id="insert_data">
		<?php echo '<input type="text" name="student_id" id="student_id" style="display: none;" value = '.$student_id.'>';  ?>
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
		<div class="row">
			<div class="col-md-3">
				<input type="hidden" name="hidden_date_odeme" id="hidden_date_odeme" />
				<input type="submit" name="insert" id="action" class="btn btn-info" value="Ekle" />
			</div>
			<div class="col-md-6"><h4 style="text-align: center;">Ödeme Durum Bilgileri</h4></div>
			<div class="col-md-3">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal" style="float: right;">
					Güncelle
				</button>
			</div>
		</div>
	</form>
</div>

<div class="container col-md-12" >
	<br>
	<table id="odemeVeriTableID" border="1" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>İd</th>
				<th>Ay</th>
				<th>Tarih</th>
				<th>Durum</th>
			</tr>
		</thead>

		<?php
		$sql = "SELECT * FROM odeme_data WHERE student_FK = $student_id ORDER BY aylar,'DATE(date_odeme)' ASC";
		if ($result = $conn->query($sql, PDO::FETCH_ASSOC)) {
			foreach ($result as $array) {
				echo "<tr class='paymentRow'>";
				echo "<td class='id_odeme'>".$array['id']."</td>";
				echo "<td class='ay'>" .$array['aylar']. "</td>";
				echo "<td class='tarih'>" .$array['date_odeme']. "</td>";
				echo "<td class='odemeBilgisi'>" .$array['o_bilgisi']. "</td>";
				echo "</tr>";
			}
		}else{
			echo "baglantı yok!";
		}

		?>

	</table>

</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" id="modelDeneme">

	</div>
</div>

<script>

	$('.paymentRow').click(function(event){
		event.preventDefault();
		console.log('tikladi');
		$('.paymentRow').removeClass('selected');
		$(this).addClass('selected');
		var idOdeme, ay, tarih, odemeBilgisi;
		idOdeme = $(this).find('.id_odeme').text();
		ay = $(this).find('.ay').text();
		tarih = $(this).find('.tarih').text();
		odemeBilgisi = $(this).find('.odemeBilgisi').text();
		console.log(idOdeme);
		$.ajax({  
			url:"modal_dialog.php",  
			method:"POST",  
			data:{id_odeme:idOdeme, ay:ay, tarih:tarih, odemeBilgisi:odemeBilgisi},  
			success:function(data){ 
				$('#modelDeneme').html(data);  
			}  
		});  
	});

</script>




