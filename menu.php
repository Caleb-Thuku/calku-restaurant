<?php
require_once "connect.php";
$conn = connect();
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: ../../project/login.php?login=invalid");
}

?>

<html>

<head>
<title>Ordering Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="master.css">

</head>
<style>
body{
margin: 0;
background-image: url("foodF.jpg");
background-position: center;
background-size: cover;
}
</style>


<body>
<div class="navbar">
  <img src="logo.png" alt="LOGO" class="navLogo">
  <a href="login.php" onclick="">Logout?</a>
  <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user-check"></i><?php print (" : ".$_SESSION["Username"]."");?></a>

 <a href="#help">Help</a>
  <a href="orders.php">Orders</a>
  <a href="calku.php">Home</a>
 </div>


<form class="" action="#" method="post">
<h1>Please Select the food you want to order</h3>
<label>Food:</label>
<select name="food" id = "selector">
<?php
$query = "SELECT FoodID,FoodItem FROM foods order by FoodID";
$results = $conn->query($query);
while($row= $results->fetch_assoc()){

echo "<option value =".$row['FoodItem'].">".$row['FoodItem']."</option>";
}
?>
</select>
<div>
<label>Quantity:</label>
<input type = "number" name = "ItemNumber"/>
</div>
<div>
<input type="submit" name="submit" value="Add Order"  > <br> <br>

<a href="orders.php">VIEW ORDERS</a>
</div>
</form>


<?php
if(isset($_POST['food'])){
$selected_food = $_POST["food"];
$quantity = $_POST["ItemNumber"];

$counter = 0;
$query2 = "SELECT * FROM foodS WHERE FoodItem = '$selected_food'";
$all = $conn->query($query2);

print("<h3>Your Order will appear here:<h3>");
while($row = mysqli_fetch_array($all)){
$unitprice = $row['Price'];
$total = $unitprice * $quantity;
echo "Your Total amount is: ".$total." ";
while($counter < $quantity){
  $pic = $row['Picture'];
echo "<img src = '$pic' style = 'margin = 10px'/>";
$counter++;
}
}
$name=$_SESSION["Username"];
$userQuery="SELECT UserID FROM users WHERE username='$name'";
$user= $conn->query($userQuery);
while($row = $user->fetch_assoc()){
  $uid=$row['UserID'];
}

$oid = mt_rand(10,100000);
$odid = mt_rand(1000,100000000);
//$uid = $_SESSION["UserID"];
date_default_timezone_set('Africa/Nairobi');
$date = date("Y-m-d h:i:sa",time());

$query3 = "INSERT INTO `orders`(`id`,`UserID`, `date_created`, `amount`, `status`) VALUES ('$oid','$uid','$date','$total','pending')";
insertData($query3);

$query4 = "INSERT INTO `order_details`(`id`, `order_id`, `unit_amount`, `description`, `quantity`, `date_created`, `status`) VALUES ('$odid','$oid','$unitprice','$selected_food','$quantity','$date','pending')";
insertData($query4);



}


?>

</body>

</html>
