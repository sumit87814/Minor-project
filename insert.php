<?php include 'header.php'; ?>
<?php

if(!isset($_SESSION["username" == 'admin'])){

}
else{
  header("location:login.php");
}
session_unset();

error_reporting(0);

$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$monthly=$_POST['monthly'];
	$address=$_POST['address'];
  // $Contact=$_post['contact'];
	$contactno=$_POST['contactno'];
	$floor=$_POST['floor'];
	$utility=$_POST['utility'];
	$descrip=mysqli_real_escape_string($mysqli ,$_POST['descrip']);
	
	$target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["images"]["name"]);
	$temp_file=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
	
	
	$query="INSERT INTO propety (id,name,monthly,address,contactno,floor,utility,descrip,images) VALUES ('$id','$name','$monthly','$address','$contactno','$floor','$utility','$descrip','$temp_file')";
	$insert=$mysqli->query($query);
	$last_id = $mysqli->insert_id;
	$c=count($_FILES['img']['name']);
	if($insert){

		if($c < 10){

			for ($i=0; $i <$c; $i++) { 
				$img_name=$_FILES['img']['name'][$i];
				move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
				$query_multi="INSERT INTO details(images,proid) VALUES ('$img_name','$last_id')";
				$ins=$mysqli->query($query_multi);
			}
			// else{
			// 	echo "MAX LIMIT EXCEED";
			// }

		}

	}


}


?>
<style type="text/css">
	
    body{
        background-image:url("images/home.jpg");
        background-size: cover;
    }

    
    </style>




<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>



<div class="container"> 

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Add a Property </legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Owner Name</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control"  placeholder="Name Of Property Owner">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Property price</label>
      <div class="col-lg-10">
        <input type="text" name="monthly" class="form-control"  placeholder="Price of property">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="address" rows="3" id="textArea" placeholder="Address"></textarea>
      </div>
</div>
<!-- //here
<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Contact details</label>
      <div class="col-lg-10">
        <input type="text" name="contact" class="form-control"  placeholder="Number and Email" >
      </div>      
</div> -->


    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Contact info</label>
      <div class="col-lg-10">
        <input type="text" name="contactno" class="form-control"  placeholder="Number and Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Floor Space</label>
      <div class="col-lg-10">
        <input type="text" name="floor" class="form-control"  placeholder="Floor Space">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">current status</label>
      <div class="col-lg-10">
        <input type="text" name="utility" class="form-control"  placeholder="Sold out / For Sale">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="descrip" rows="3" id="textArea" placeholder="About House"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Featured Image</label>
      <div class="col-lg-10">
        <input type="file" name="images">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Rooms Images</label>
      <div class="col-lg-10">
        <input type="file" name="img[]" multiple>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <br><br>
        
        <div class="adminpanel">
      <a href="addproperty.php"class="btn btn-success">Admin Dashboard</a>
    </div>
      </div>
    </div>
  </fieldset>
</form>

</div>

<br><br><br><br><br><br><br><br><br>
<?php  include 'footer.php' ; ?>
</body>
</html>