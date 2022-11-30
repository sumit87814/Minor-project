<?php
error_reporting(0);
$mysqli=new mysqli('localhost','root','','property');

if($_GET['propety_id'])
{
    $user_id=$_GET['propety_id'];
    $sql="DELETE FROM propety WHERE id='$user_id'";
    
    $result=mysqli_query($mysqli,$sql);
}

if($result){
    header("location: addproperty.php");
}





?>