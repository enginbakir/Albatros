<?php 

$output = "";
if(isset($_POST["id"]))  
{
	require_once "../connectDB.php";
	
	$id = (int)$_POST["id"];

	$row = $conn->query("SELECT * from student where student_PK = ".$id, PDO::FETCH_ASSOC)->fetch();

	$photo = $row['photo'];
	if(empty($photo)){
		if($row['gender_FK'] == 2)
			$photo = "../dist/img/avatar5.png";
		if($row['gender_FK'] == 1)
			$photo = "../dist/img/avatar2.png";
	}
	$output .= "<img id = 'ogrenciPhoto' class='profile-user-img img-responsive img-circle' src='".$photo."' alt='User profile picture'>"
	$output .= "<h3 class='profile-username text-center'>".$row['name']." ".$row['surname']."</h3>
	<ul class='list-group list-group-unbordered'>
	<li class='list-group-item'>";
	$output .= "<b>TC</b> <a class='pull-right'>".$row['tc_no']."</a></li>";
	$output .= "<li class='list-group-item'>
	<b>Doğum Tarihi</b> <a class='pull-right'>".$row['birthday']."</a></li>";
	$output .= "";
	$conn = null;
}

$output = "
<li class='list-group-item'>
<b>Ulaşım</b> <a class='pull-right'>Servis</a>
</li>
<li class='list-group-item'>
<b>Eğitsel Tanı</b> <a class='pull-right'>Excepteur sint occaecat.</a>
</li>
<li class='list-group-item'>
<b>Kaba Değerlendirme</b> <a href='' class='pull-right'>görüntüle</a>
</li>
<li class='list-group-item'>
<b>BEP</b> <a href='' class='pull-right'>görüntüle</a>
</li>
<li class='list-group-item'>
<b>Dönem Başlayış Tarihi</b> <a class='pull-right'>18.09.2017</a>
</li>
<li class='list-group-item'>
<b>Dönem Bitiş Tarihi</b> <a class='pull-right'>07.06.2018</a>
</li>
</ul>";

exit();
?>