<?php

require_once '../connectDB.php';

function fetchAll($query){
    global $conn;

    $stmt = $conn->query($query);
    return $stmt->fetchAll();
}
function performQuery($query){
  global $conn;
  $stmt = $conn->prepare($query);
  if($stmt->execute()){
    return true;
}else{
    return false;
}
}

?>