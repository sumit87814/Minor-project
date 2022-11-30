<?php

error_reporting(0);
$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if($_SERVER["REQUEST_METHOD"]=="POST"){

	$username=$_POST['username'];
	$password=$_POST['password'];
	

  $sql="select * from login where username='".$username."'AND password='".$password."' "  ;

$result= mysqli_query($mysqli,$sql);

$row=mysqli_fetch_array($result);

if($row["usertype"]=="user"){
    
    header("location:index.php");
}

else if($row["usertype"]=="admin"){
    
    header("location:insert.php");
}

else{
    echo  '<script>alert("your username or password is wrong")</script>';
 
}


}


?>
<style type="text/css">
	
    #sumit{
        font-size:30px;
      
    }
    input {
        width:140px;
        height: 30px;
        box-sizing: border-box;
        
    }
    body{
        background-image:url("images/login.jpg");
    }

    
    </style>




<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

 <center>

 <h1>Login Panel
<br><br> user/admin</h1>
 <br><br>
    <div id="sumit" style="background-color:#349491; width:500px">
<form action="#" method="POST">


    <div >
        <br><br>
        <label for="">username</label>
        <input type="text" name="username" required >
    </div>
<br><br>
    <div>
        <label >password</label>
        <input type="password" name="password" required>
    </div>
<br><br>
    <div>
        <input type="submit" value="Login">
    </div>
</Form>
</div>
 </center>
    
</body>
</html>