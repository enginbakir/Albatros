<?php 
require_once "../connectDB.php";


$output = "";
if(isset($_POST["id"]))  
{  
	$studentID = (int)$_POST["id"];
	$personelId = (int)$_POST["personelID"];
	$sql  = 'SELECT name,note,tarih from notes inner JOIN  personel on notes.personel_FK = personel.personel_PK and notes.personel_FK='.$personelId.' where notes.student_FK = '.$studentID.' ';
	$retval = $conn->query($sql, PDO::FETCH_ASSOC);
	foreach ($retval as $row)  
	{  
		$output .="<tr>
		<td>".$row["name"]."</td>
		<td>".$row["note"]."</td>
		<td>".$row["tarih"]."</td>
		</tr>"; 
	}  
	echo $output;  
}  

exit ();
?>