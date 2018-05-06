<?php

$id = $_POST['id'];
$conn = new mysqli('localhost', 'root', '12345678', 'albatros');
$tarih=$_POST['tarih'];
$aciklama=$_POST['aciklama'];
$durum = "Gelmedi";

$sql="INSERT INTO `devamsızlık_takvimi` (`id`, `tarih` , `durum`, `aciklama_devam`, `student_FK`) VALUES (NULL, '$tarih','$durum','$aciklama','$id')";

if ($conn->query($sql) === TRUE) {
    echo "Devamsızlık ".$tarih." 'de başarıyla kaydedilmiştir.";
}
else 
{
    echo "failed";
}

mysqli_close($conn);

?>