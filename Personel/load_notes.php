<?php 

$output = "";
if(isset($_POST["id"]))  
{  
	require_once "../connectDB.php";

	$studentID = (int)$_POST["id"];
	$sql = 'SELECT COUNT(*) from notes inner JOIN  personel on notes.personel_FK = personel.personel_PK where notes.student_FK = '.$studentID.'';
	$retval = $conn->query($sql);
	if($retval->fetchColumn() > 0){
		$sql  = 'SELECT note_PK,name,note,tarih from notes inner JOIN  personel on notes.personel_FK = personel.personel_PK where notes.student_FK = '.$studentID.'';
		$result = $conn->query($sql);
		foreach ($result as $row)  
		{  
			$output .="<tr>

			<td>".$row["name"]."</td>
			<td>".$row["tarih"]."</td>
			<td>".$row["note"]."</td>
			<td class='noteid' style='display: none'>".$row['note_PK']."</td>
			</tr>"; 
		}  
		$output2 = "<input type='button' class='btn btn-primary' id='deletenote' value='Not Sil'>";
		$output .="<script>
var noteid;
$('#notes tr').on('click',function(){
	$('#notes .selected').removeClass('selected');
	$(this).addClass('selected');
	noteid = $('.noteid',this).html();
	$('#deletenote').on('click',function(){
		$.ajax({
			url:'deleteNote.php',
			method:'POST',
			data:{noteid:noteid},
			success:function(data){
				alert(data);
			}
		});
	});

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

echo json_encode(array("value1" => $output,'value2' => $output2));
$conn = null;
exit ();
?>