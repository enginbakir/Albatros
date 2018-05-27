<?php 

$output = "";
if(isset($_POST["id"]))  
{  
	require_once "../connectDB.php";

	$studentID = (int)$_POST["id"];
	$sql = 'SELECT COUNT(*) from notes inner JOIN  personel on notes.personel_FK = personel.personel_PK where notes.student_FK = '.$studentID.'';
	$retval = $conn->query($sql);
	if($retval->fetchColumn() > 0){
		$sql  = 'SELECT name,note,tarih from notes inner JOIN  personel on notes.personel_FK = personel.personel_PK where notes.student_FK = '.$studentID.' ORDER BY tarih DESC';
		$result = $conn->query($sql);
		foreach ($result as $row)  
		{  
			$output .="<tr>
			<td>".$row["name"]."</td>
			<td>".$row["note"]."</td>
			<td>".$row["tarih"]."</td>
			</tr>"; 
		}  
		$output .= 	"<script>
		$('#notes tr').on('click',function(){
			$('#notes .selected').removeClass('selected');
			$(this).addClass('selected');
		});
		</script>";
	}
	else{
		$output.="<tr>
		<td>Kayıtlı Not Bulunamadı.</td>
		</tr>"; 
	}
	$conn = null;
}  

echo $output;  

exit ();
?>