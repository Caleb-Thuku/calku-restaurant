<?php
require 'connect.php';
connect();
/*echo "<p>You have selected ".$quantity." ".$selected."</p>";
$no=1;
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
*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FOOD APP</title>
    <link rel="stylesheet" type="text/css" href="master.css">
    <link rel="stylesheet" href="master.css">
  </head>
  <body>
    <h1>FOOD PHP</h1>
    <form class="order"  method="post">
      <p>SELECT FROM OUR MENU</p>
    <!--<label for="">Food-Item</label><input type="text" name="food" value="" placeholder="food"> <br>
    <label for="">Upload Picture</label> <input type="file" name="picture" value=""> <br>
<label for="">Price</label>  <input type="number" name="price" value="">
    <br>
  -->
    <select class="foods" name="options">
<?php
$optQuery="SELECT FoodID,FoodItem FROM foods order by FoodID";
$res= mysqli_query(connect(),$optQuery);
while ($row= $res->fetch_assoc()) {
    echo "<option>".$row['FoodItem']."</option>";
  }
?>
  </select>
  <br>
    <input type="number" name="quantity" value="">
    <br>
    <input type="submit" name="submit" value="ORDER">
    <img src="">
    </form>
    <?php
    $selected = $_POST['options'];
    $quantity = $_POST['quantity'];
    echo "You have selected ".$quantity." ".$selected."s";

//$conn=mysqli_connect($dbserver,$username,$password,$dbname) or die("Could not connect");
$disQuery="SELECT FoodID,Picture FROM foods WHERE FoodItem='$selected'";
$output= connect()->query($disQuery);
while($row = $output->fetch_assoc()){
for ($i=0; $i <$quantity ; $i++) {
  $pic = $row['Picture'];
  echo "<img src='$pic'>"
  ;
}


}
    /*if($selected=="Pizza"){
      while($no<=$quantity){
    $query = "SELECT Picture FROM 'foods' WHERE FoodItem='BURGER'";
$result = mysqli_query($conn, $query);
echo '<br>';
var_dump($result);
while($row = mysqli_fetch_array($result))
{
  echo "
  <img src = 'data:image/jpg;base64,".base64_encode($row['Picture'])."'/>
  "
;
}
      //echo "<img src='pizza.png'";
        $no++;
      }
    }
     if($selected=="Burger"){

        while($no<=$quantity){
          echo "<img src='burger.png' >";
          $no++;
        }
      }
      if($selected=="Chicken"){

          while($no<=$quantity){
            echo "<img src='chicken.png'>";
           $no++;
          }
      }
*/
    ?>
