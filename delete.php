<?php
require_once 'connect.php';
$conn=connect();

$delQ="DELETE FROM orders";
$delete = $conn->query($delQ);
if($delete){
  echo "ORDER DELETED successfully";
  header("Location ../../orders.php?delete=success");
}
else {
    header("Location ../../orders.php?delete=error");
  // code...
}

 ?>
