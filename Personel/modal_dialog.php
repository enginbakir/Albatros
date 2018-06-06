		<?php 

		require_once '../connectDB.php';

		$id_odeme=$_POST['id_odeme'];
		$ay=$_POST['ay'];
		$tarih=$_POST['tarih'];		
		$odemeBilgisi=$_POST['odemeBilgisi'];

		$o_b  = '';

		$query = "SELECT bilgiler FROM odeme_bilgileri ";

		$statement = $conn->prepare($query);

		$statement->execute();

		$result = $statement->fetchAll();

		foreach($result as $row)
		{
			$o_b .= '<option value="'.$row["bilgiler"].'">'.$row["bilgiler"].'</option>';
		}

		?>


		<div class="modal-content">
			<form method="POST" action="payment_update.php">

				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ödeme Durum Güncelleme</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<input type="hidden" name="thisisid" id="thisisid" value="<?=$id_odeme?>">
				<div class="modal-body">

					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">AY: </label>
						<div class="col-sm-8">
							<h4><?php echo $ay ?></h4>
						</div>
					</div>
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label">Tarih: </label>
						<input type="hidden" name="tarih" id="tarih"  value="<?=$tarih?>">
						<div class="col-sm-8">
							<h4><?php echo $tarih ?></h4>
						</div>
					</div>
					<div class="form-group">
						<label for="title" class="col-sm-4 control-label" >Ödeme Bilgisi: </label>
						<div class="col-sm-8">
							<h4><?php echo $odemeBilgisi ?></h4>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-4 control-label">Durum: </label>
						<div class="col-sm-8">
							<select class="form-control" name="odeme">
								<option disabled="disabled" selected="selected" value="">Ödeme Bilgisini Seçiniz...</option>
								<?php echo $o_b; ?>
							</select>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-4 col-sm-8">
							<div class="checkbox">
								<label class="text-danger"><input type="checkbox" name="delete" value="Sil">Sil</label>
							</div>
						</div>
					</div>
				</div>	
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
					<button type="submit" class="btn btn-secondary">KAYDET</button>
				</div>			
			</form>
		</div>
