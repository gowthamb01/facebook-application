<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <style>
    /* General styles */
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }
    a {
      color: #555;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    /* Header styles */
    header {
      background-color: #2c3e50;
      color: #fff;
      padding: 10px;
      text-align: center;
    }
    header h1 {
      margin: 0;
      font-size: 32px;
    }
    /* Navigation styles */
    nav {
      background-color: #fff;
      border-bottom: 2px solid #2c3e50;
      padding: 10px;
      margin-bottom: 20px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    }
    nav ul {
      margin: 0;
      padding: 0;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav li {
      margin-right: 20px;
    }
    nav a {
      color: #2c3e50;
      font-weight: bold;
      transition: all 0.3s ease;
      padding: 10px;
      border-radius: 5px;
    }
    nav a:hover {
      color: #fff;
      background-color: #2c3e50;
      cursor: pointer;
    }
    /* Content styles */
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 50px 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
    }
    h2 {
      margin-top: 0;
      font-size: 28px;
    }
    p {
      margin-bottom: 20px;
      font-size: 16px;
    }
    /* Logout link styles */
    .logout {
      background-color: #fff;
      color: #2c3e50;
      border: 2px solid #2c3e50;
      padding: 10px 20px;
      border-radius: 5px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .logout:hover {
      background-color: #2c3e50;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1>User Dashboard</h1>
  </header>
  <nav>
    <ul>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="#">Friends</a></li>
      <li><a href="upload.php">Uploads</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </nav>
  <div class="container">
    <?php
    session_start();
    echo "<table><tr><td><h5>face-book Welcome </h5></td>";echo "<td>".$_SESSION["a"]."</td></tr></table>";
    
    $con=mysqli_connect("localhost","root","","upload");
    $sql="SELECT * from images order by id DESC";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
      while($images= mysqli_fetch_assoc($res))
     
      {
    
        echo "<hr>";
        ?>
      <div class="alb">
     <?php
      echo "<table><tr><td><img src='Facebook-logo.png' width='50px'></td><td><h5>posted by</h5></td>";
           echo "<td>".$images['uname']."</td></tr></table>";?>
        <img src="uploads/<?=$images['filename']?>" width="500px">
        <form method="post" action="likes.php" >
<button type="submit" name='submit' value="<?php echo $images['filename'];?>" style="background-color:lightblue;width:30px;border-radius:7px;margin-left:50px;"  >like</button>&nbsp;&nbsp;
<span class="likes"><?php echo $images['likes']?></span><br>
</form>
<?php echo $images['description'];
?>
      </div>

  <?php  }}?>
    
  </div>
</body>
</html>
