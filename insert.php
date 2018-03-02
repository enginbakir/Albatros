<?php 
//insert.php
var_dump($_POST);

foreach($_POST["framework"] as $key){

	echo "<br><br>".$key."<br>";

}

echo "------------------";

/*
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO like_table(framework) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}*/
?>
