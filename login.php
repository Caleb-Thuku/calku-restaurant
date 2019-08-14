<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN PAGE</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="master.css">
  </head>

  <body>
    <div class="navbar">
    <img src="logo.png" alt="LOGO" class="navLogo">
    <a href="register.php">Join Us</a>
    <a href="login.php">Events</a>
    <a href="calku.php">Home</a>
    </div>
  <div id="loginForm">
    <form class="" action="#" method="post">
      <h1>LOGIN</h1>
    <label for="">Username</label>  <input type="text" name="username" required> <br>
    <label for="">Password</label>  <input type="password" name="password" required> <br>
    <input type="submit" name="submit" value="submit">
    <h5>Not yet registered? <a href="register.php">Register Here</a>  </h5>
    </form>
  </div>
  </body>
</html>
<?php
session_start();
include 'connect.php';


if(isset($_POST['submit'])){
  $user= $_POST['username'];
  $password= $_POST['password'];
  $login_sql= "SELECT * FROM users WHERE Username ='$user'";

    $output=  connect()->query($login_sql);
      // code...
  $row = $output->fetch_assoc();
  
      $verify= $row['Password'];

      $usertype= $row['UserType'];
       if(password_verify($password, $verify) && $usertype == "Administrator"){
          echo "Verified";
        $SESSION['UserID'] = $row['UserID'];
         $_SESSION['Username']= $row['Username'];
         //$_SESSION['FName']= $row['Fname'];
         $_SESSION['UserType']= $usertype;
         header("Location: ../../project/index.php?login=success");
        }
        if(password_verify($password, $verify) && $usertype== 'Client'){
          $SESSION['UserID'] = $row['UserID'];
          $_SESSION['Username']= $row['Username'];
          $_SESSION['UserType']= $usertype;
          header("Location: ../../project/menu.php?login=success");
        }
        else{

            echo "
            ----ERRONEOUS DETAILS---- ";
            echo '<script language="javascript">';
            echo 'alert("USERNAME OR PASSWORD INCORRECT")';
            echo '</script>';
        }
      }
 ?>
