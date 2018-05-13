
<!DOCTYPE html>
<html>
<body>

<?php
$str = "Helddlo";
echo md5($str);

if (md5($str) == "843f23748c8f9c6947a4f71e8dff9fe1")
  {
  echo "<br>".$str;
  exit;
  }
?>
  
</body>
</html>