<?php


$conn = new mysqli('localhost', 'root', '123456', 'albatros');
$tarih=$_POST['tarih'];
$acıklama=$_POST['acıklama'];
$durum = "Gelmedi";

$sql="INSERT INTO `devamsızlık_takvimi` (`id`, `tarih` , `durum`, `aciklama_devam`, `student_FK`) VALUES (NULL, '$tarih','$durum','$acıklama',1)";

if ($conn->query($sql) === TRUE) {
    echo "Devamsızlık ".$tarih." 'de başarıyla kaydedilmiştir.";
}
else 
{
    echo "failed";
}



?>