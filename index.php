<?php
session_start();
$conn = new mysqli("localhost","root" ,"","reagistration");

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
?>
<html>
  <head>
    <style>
      body{
        padding-top: 200px;
      }
    </style>
  </head>
    <?php
    session_start();
      $a = $_POST['mid'];
      $b = $_POST['pass'];
      $res = mysqli_query($conn,"SELECT * FROM student WHERE email='$a' AND i_password='$b' ");
      $row = mysqli_fetch_array($res);
      if(is_array($row))
      {
        $_SESSION["a"]=$row['i_name'];
        $_SESSION["b"]=$row['i_password'];
       }
       else
    {
      echo "<script>alert('invalid credentialss!!! pls sign in')</script>";
    }
  
    if(isset($_SESSION["a"]))
    {
      header("Location:login.php");

    }
    else{
header("Location:login.html");
      
    }
?>

  </body>
</html>