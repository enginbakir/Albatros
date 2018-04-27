<?php 

$OB = intval($_POST['oBilgisi']);

$con = mysqli_connect('localhost','root','123456','albatros');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

if ($OB == 1) {
 $sql="UPDATE 'odeme_bilgileri' SET `ödeme` = '1' WHERE `odeme_bilgileri`.`id_aylar` = '".$_REQUEST['ay']."'";
 if(mysqli_query($sql)){
   return "success!";
}
else {
    return "failed!";
}

} else {
   $sql="UPDATE 'odeme_bilgileri' SET `ödeme` = '0' WHERE `odeme_bilgileri`.`id_aylar` = '".$_REQUEST['ay']."'";
   if(mysql_query($sql)){
       return "success!";
   }
   else {
    return "failed!";
}
}





 $output = '';  
$OB = intval($_POST['oBilgisi']);

 if(isset($OB))  
 {  
      if($OB != '')  
      {  
          if ($OB == 1) {
             $sql="UPDATE 'odeme_bilgileri' SET `ödeme` = '1' WHERE `odeme_bilgileri`.`id_aylar` = '".$_REQUEST['ay']."'";
                if(mysqli_query($sql)){
                    return "success!";
                }
                else {
                    return "failed!";
                }

            } else {
               $sql="UPDATE 'odeme_bilgileri' SET `ödeme` = '0' WHERE `odeme_bilgileri`.`id_aylar` = '".$_REQUEST['ay']."'";
                if(mysql_query($sql)){
                    return "success!";
                }
                else {
                    return "failed!";
                }
            }
      }  
 
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["product_name"].'</div></div>';  
      }  
      echo $output;  
 } 

?>
