<?php
require_once "connect.php";
//require_once 'menu.php';
$conn = connect();
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: ../../login.php?login=invalid");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MY ORDERS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <div class="navbar">
      <img src="logo.png" alt="LOGO" class="navLogo">
      <a href="login.php" onclick="">Logout?</a>
      <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user-check"></i><?php print (" : ".$_SESSION["Username"]."");?></a>

     <a href="#help">Help</a>
      <a href="orders.php">Orders</a>
      <a href="calku.php">Home</a>
     </div>
  <div id="orderPart">
    <h1>VIEW MY ORDERS</h1>
    <form class="" action="delete.php" method="post">

    <table class="center" border="1px solid">
      <tr>
        <th>OrderID</th>
        <th>Amount</th>
        <th>Status</th>
        <th>date_created</th>

      </tr>
      <tr>
  <?php
  $oQuery="SELECT * FROM orders ";
  $price=0;
  $orders= $conn->query($oQuery);
  while ($row = $orders->fetch_assoc()) {

    echo "  <tr><td>".$row['id']."<td>".$row['amount']."</td><td>".$row['status']."</td><td>".$row['date_created']."</td></tr>";
    $price=+$row['amount'];

  }

?>


    </table>
    <input type="submit" name="Delete" value="Delete">
      </form>
    <br>
    <p><?php echo "YOUR TOTAL IS: $price" ?>  </p>

    <input type = "submit" name = "confirm" value = "Confirm Order" />
    <?php
    if(isset($_POST['Delete'])){
      $foodItem =$row['FoodItem'];
     $sqlDel="DELETE FROM orders";
    $delete=$conn->query($sqlDel);
     if($delete == TRUE){
       echo "Deleted";
     }
     else{
       echo "error deleting";
     }
    }
     ?>
    </div>
  </body>
</html>
