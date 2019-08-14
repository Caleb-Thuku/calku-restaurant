<?php
function connect(){
  $dbserver="localhost";
  $username="root";
  $password="";
  $dbname="pizza";

 $conn=mysqli_connect($dbserver,$username,$password,$dbname) or die("Could not connect");
 // Check connection
 if (mysqli_connect_errno()) {
     echo "Connection failed: " .mysqli_connect_error();
 }
 echo "Connected successfully";

 return $conn;
}
/*function setData($sql){
  $linked=connect();
  if($mysqli_query($linked.$sql)){
    return true;
  }
}
function getData($sql){
  $conn=connect();
  $result=mysqli_query($conn.$sql);
  return $result;

  //while($row=mysqli_fetch_array($result,$mysqli_assoc)){

  }
*/
  function insertData($sql)
  {
    $conn = connect();
    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  }


 ?>
