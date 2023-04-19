<?php
session_start();
$uid=$_SESSION['a'];
$pid=$_POST['submit'];
$con=mysqli_connect("localhost","root","","upload");
$q2="select * from likes where filename='$pid' and userid='$uid'";
$r=mysqli_query($con,$q2);
if(mysqli_num_rows($r)==0)
{
$sql="update images set likes=likes+1 where filename='$pid'";

$q1="insert into likes(filename,userid) values('$pid','$uid')";
$res=mysqli_query($con,$sql);
$re=mysqli_query($con,$q1);
header("Location:login.php");
}
else{
    $sql="update images set likes=likes-1 where filename='$pid'";
    $res=mysqli_query($con,$sql);
    $q="delete from likes where filename='$pid' and userid='$uid'";
    $r=mysqli_query($con,$q);
    header("Location:login.php");
}
?>