 <?php
 include('process.php');
 $newobj = new processing();

 if(isset($_POST['statusname'],$_POST['getid'])){
 	$statusid = $_POST['statusname'];
 	$id = $_POST['getid'];

 	$newobj->getdata($statusid,$id);
 }
 ?>