<?php
require_once "connect.php";
$conn = connect();
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: ../../project/login.php?login=invalid");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FOOD APP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="master.css">
  </head>
  <body>
    <div class="navbar">
      <img src="logo.png" alt="LOGO" class="navLogo">
      <a href="login.php" onclick="">Logout?</a>
      <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user-check"></i><?php print (" : ".$_SESSION["Username"]."");?></a>


      <a href="orders.php">Orders</a>
      <a href="calku.php">Home</a>
     </div>

    <form class="order"  method="post">
        <h1>ADD FOODS</h1>
    <label for="">Food-Item</label><input type="text" name="food" value="" placeholder="food"> <br>
    <label for="">Upload Picture</label> <input type="file" name="picture" value=""> <br>
<label for="">Price</label>  <input type="number" name="price" value="">
    <br>

    <input type="submit" name="submit" value="SAVE">
    </form>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db= "pizza";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$original_name= $_POST['picture'];
/*$original_file_name=$_FILES["picture"]["name"];
$tmp_file_location=$_FILES['picture']['tmp_name'];
$full_path= $original_file_name.$tmp_file_location;
*/
echo "<br>File name is ". $original_name ;
echo "<br>";
/*$file_path="assets/";
$file_type=substr($original_file_name,strpos($original_file_name,'.'),strlen($original_file_name));
$new_file_name=time().$file_type;
if(move_uploaded_file($tmp_file_location,$file_path.$new_file_name))
*/
if(isset($_POST['SAVE'])){
$sql= "INSERT INTO foods (FoodItem, Picture, Price)
 VALUES('$_POST[food]','$original_name','$_POST[price]')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "<br><br>Error updating record: " . $conn->error;
}
$conn->close();
}
?>
<form method="post" action="#">
  <h1>VIEW CURRENT FOODS</h1>
<table class="center" border="1px solid">
  <thead>
    <tr><th>Food Item</th><th>Price</th> <th>Picture</th> </tr>
  </thead>
  <tbody>
<?php
$conn = new mysqli($servername, $username, $password,$db);
$sql2="SELECT * FROM foods ORDER BY FoodID";
 $table= $conn->query($sql2);

 while($row= $table->fetch_assoc())
 {
$display=$row['Picture'];
echo "<tr><td>".$row['FoodItem']."</td><td>".$row['Price']."</td> <td><img src='$display' width='50px'>"."</td><td>.<input type='submit' name='submit' value='submit'>"."</td></tr>";


  }

?>
  </tbody>
</table>
</form>
<?php
if(isset($_POST['submit'])){
  $foodItem =$row['FoodItem'];
 $sqlDel="DELETE FROM foods WHERE FoodItem =='$foodItem'";
 $delete=$conn->query($sqlDel);
 if($delete == TRUE){
   echo "Deleted";
 }
 else{
   echo "error deleting";
 }
}
 ?>
<?php
$conn->close();
      ?>
  </body>
</html>
