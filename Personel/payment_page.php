<?php

include('database_connection.php');

$student_id = $_POST['id'];

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

	<br /><br />
	<div class="container" style="width:600px;">
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
			<input type="hidden" name="hidden_date_odeme" id="hidden_date_odeme" />
			<input type="submit" name="insert" id="action" class="btn btn-info" value="Insert" />
		</form>
	</div>




