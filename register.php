
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="master.css">
    <title>REGISTRATION PAGE</title>
  </head>
  <div class="navbar">
  <img src="logo.png" alt="LOGO" class="navLogo">
  <a href="register.php">Join Us</a>
  <a href="login.php">Events</a>

  <a href="calku.php">Home</a>
  </div>
  <body>

    <div class="forms">
    <form class="" action="#" method="post">
      <h1>REGISTRATION</h1>
    <label for="">First Name</label>  <input type="text" name="Fname" value=""> <br>
    <label for="">Second Name</label>  <input type="text" name="Lname" value=""> <br>
    <label>Username</label>  <input type="text" name="Username" value=""> <br>
    <label for="">Password</label>  <input type="password" name="Password" value=""> <br>
    <label for="">Usertype</label>
    <select class="" name="usertype"> <br>
      <option selected disabled>--SELECT--</option>
        <option value="Client">Client</option>
        <option value="Administrator">Administrator</option>
      </select> <br>
    <input type="submit" name="REGISTER" value="REGISTER">
    <h5>Already a member? <a href="login.php">Login</a> </h5>
    </form>
  </div>
  </body>


</html>
<?php
require 'connect.php';
connect();
if(isset($_POST['REGISTER'])){
echo "DETAILS SUBMITTED";
$FName= $_POST['Fname'];
$LName=$_POST['Lname'];
$Username = $_POST['Username'];
$Usertype= $_POST['usertype'];
$password=$_POST['Password'];
$hash_pass = password_hash($password, PASSWORD_DEFAULT);
echo $hash_pass;
echo "\r\n";
$sql= "INSERT INTO users (FName,LName,Username,Password,UserType) VALUES('$FName','$LName','$Username','$hash_pass','$Usertype')";
insertData($sql);
}
 ?>
