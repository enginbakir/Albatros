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
		<div class="row">
			<div class="col-md-3">
				<input type="hidden" name="hidden_date_odeme" id="hidden_date_odeme" />
				<input type="submit" name="insert" id="action" class="btn btn-info" value="Ekle" />
			</div>
			<div class="col-md-6"><h4 style="text-align: center;">Ödeme Durum Bilgileri</h4></div>
			<div class="col-md-3">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="float: right;">
					Güncelle
				</button>
			</div>
		</div>
	</form>
</div>

<div class="container" style="width:600px;">
	<br>
	<table id="ödemeVeriTableID" border="1" class="table table-bordered table-hover">
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
		if ($result = $connect->query($sql, PDO::FETCH_ASSOC)) {
			foreach ($result as $array) {
				echo "<tr>";
				echo "<td class='id_odeme'>".$array['id']."</td>";
				echo "<td class='ay'>" .$array['aylar']. "</td>";
				echo "<td class='tarih'>" .$array['date_odeme']. "</td>";
				echo "<td class='ödemeBilgisi'>" .$array['o_bilgisi']. "</td>";
				echo "</tr>";
			}
		}else{
			echo "baglantı yok!";
		}

		?>

	</table>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" id="modelDeneme">

	</div>
</div>

<script>
	var id_odeme;
	function selectedRow1(){

		var index1;
		table1 = document.getElementById("ödemeVeriTableID");

		for(var i = 1; i < table1.rows.length; i++)
		{
			table1.rows[i].onclick = function()
			{
                         // remove the background from the previous selected row
                         if(typeof index1 !== "undefined"){
                         	table1.rows[index1].classList.toggle("selected");
                         }

                        // get the selected row index
                        index1 = this.rowIndex;
                        // add class selected to the row
                        $('.selected').removeClass('selected');
                        $(this).addClass("selected");
                        id_odeme = $('.id_odeme',this).html();
                        ay = $('.ay',this).html();
                        tarih =$('.tarih',this).html();
                        ödemeBilgisi =$('.ödemeBilgisi',this).html();
                        $.ajax({  
                        	url:"modal_dialog.php",  
                        	method:"POST",  
                        	data:{id_odeme:id_odeme, ay:ay, tarih:tarih, ödemeBilgisi:ödemeBilgisi},  
                        	success:function(data){ 
                        		
                        		$('#modelDeneme').html(data);  
                        	}  
                        });  
                    };
                }

                
            }

            selectedRow1();

        </script>




