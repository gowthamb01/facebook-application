<?php
$conn = new mysqli("localhost","root" ,"","reagistration");
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
 $email=$_POST["mid"];
 $password=$_POST["pass"];
     $sql = "INSERT INTO student(i_name,email,i_password) values('$name','$email','$password')";
      $res=mysqli_query($conn,$sql);
     if($res)
     {
        echo "<script>alert('data is uploaded successfully')</script>";
     }
     else
     {
        echo "Error: " . $sql . "<br>" . $conn->error;
     }
$sql="SELECT * FROM student";
$res=mysqli_query($conn,$sql);
    // output data of each row
    
if($res->num_rows>0)
{ ?>
<table border="1" cellspacing="1" cellpading="10" align="center" >
        <caption> DATA OF USERS </caption>
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>password</th>
        </tr>
    <?php
      while($row = mysqli_fetch_array($res)) {
           echo "<tr>";
           echo" <td>" .$row['i_name']."</td>";
            echo"<td>". $row['email']."</td>";
            echo"<td>". $row['i_password']."</td>";    
    } 
    
}
$conn->close();
 ?>
    

 </table>
 <a href="index.php" style="padding-left:600px;padding-top:50px;">login</a></td></tr>
 </body>
</html>
