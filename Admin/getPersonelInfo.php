<?php

try{
	require_once '../connectDB.php';

	$id = $_POST['id'];

	$stmt = $conn -> prepare("SELECT * FROM personel p, personel_user pu, personel_types pt WHERE  p.personel_PK = :Pid AND p.personel_type_FK = pt.personel_type_PK");

	$stmt-> execute([':Pid' => $id]);
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	if($row == false){
		echo "Sonuç Bulunamadı : ".$id;
	}
	else{
		echo "<div class='box box-primary'>
		<div class='box-body box-profile'>
		<img class='profile-user-img img-responsive img-circle' src=".$row['photo']." alt='User profile picture'>

		<h3 class='profile-username text-center'>".$row['name']." ".$row['surname']."</h3>
		<ul class='list-group list-group-unbordered'>
		<li class='list-group-item'>
		<b>Email-Adres</b> <a class='pull-right'>".$row['email_address']."</a>
		</li>                  
		<li class='list-group-item'>
		<b>Ünvan</b> <a class='pull-right'>".$row['personel_type']."</a>
		</li>
		<li class='list-group-item'>
		<b>Telefon :</b> <a class='pull-right'>".$row['tel_no']."</a>
		</li>
		<li class='list-group-item'>
		<b>Kayıt Tarihi</b> <a class='pull-right'>".$row['registration_date']."</a>
		</li>
		<li class='list-group-item'>
		<b>Ayrılış Tarihi</b> <a class='pull-right'>".$row['deletion_date']."</a>
		</li>
		</ul>
		</div>
		<!-- /.box-body -->
		</div>";
	}
}catch(PDOException $e) { 
	echo "Veri Tabanı Hatası :".$e->getMessage();
}


unset($_POST['id']);
$conn = null;
exit();


?>