<?php
include("function.php");

$id = $_GET['id'];

$query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
performQuery($query);

$query = "SELECT * from `notifications` where `id` = '$id';";
if(count(fetchAll($query))>0){
	foreach(fetchAll($query) as $i){
		if($i['type']=='student'){
			echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı öğrenci ".ucfirst($i['message']).".";
		}else if($i['type']=='personel'){
			echo ucfirst($i['name'])." ".ucfirst($i['surname'])." adlı personel ".ucfirst($i['message']).".";
		}
	}
}
header('location: admin.php');
?>