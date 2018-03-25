<?php 
require_once "connectDB.php";

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
$output = '';  
if(isset($_GET["id"]))  
	{  $studentID = (int)$_GET["id"];
	//$sql  = "SELECT P.name,n.note,n.tarih FROM personel P,note n WHERE student_PK = '".$_POST["id"]."' and P.personel_PK=10";
	//$sql  = 'SELECT P.name,N.note,N.tarih FROM personel P,note N WHERE N.student_PK = '.$studentID.' and P.personel_PK=10';
	//$sql  = 'SELECT P.name,N.note,N.tarih FROM personel P,note N WHERE N.student_PK = '.$studentID.' and N.personel_PK=11';
$sql  = 'SELECT name,note,tarih from notes inner JOIN  personel on notes.personel_PK = personel.personel_PK where notes.student_PK = '.$studentID.'';
$result = mysqli_query($conn, $sql);  
while($row = mysqli_fetch_array($result,MYSQL_ASSOC))  
{  
	$output .="<tr>
	<td>".$row["name"]."</td>
	<td>".$row["note"]."</td>
	<td>".$row["tarih"]."</td>
	</tr>"; 
}  
echo $output;  
}  

mysqli_close($conn);
?>