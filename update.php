<?php
error_reporting(0);
$mysqli=new mysqli('localhost','root','','property');

$id=$_GET['propety_id'];

    $sql="SELECT * FROM propety WHERE id='$id'";
    
    $result=mysqli_query($mysqli,$sql);
    
    $info=$result->fetch_assoc();

    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $monthly=$_POST['monthly'];
        $address=$_POST['address'];
        $contactno=$_POST['contactno'];
         $floor=$_POST['floor'];
         $utility=$_POST['utility'];
        $descrip=$_POST['descrip'];
    
$query="UPDATE propety set name='$name',monthly='$monthly',address='$address',contactno='$contactno',floor='$floor',utility='$utility',descrip='$descrip' WHERE id='$id'";

$result2=mysqli_query($mysqli,$query);

if($result2){
    header("location:addproperty.php");
}
}




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  
    <title>ADMIN HOME</title>
   <?php
include 'admincss.php';
   ?>
<style type="text/css">
   label{
    display:inline-block;
    width:100px;
    text-align:right;
    padding-top:10px;
    padding-bottom:10px;
   }

  body{
    background-image:url("images/home.jpg");
    /* background-size: cover; */

  }

    </style>

</head>
<body>
<?php
include 'add_sidebar.php';

?>


<center>
<div class="content">
    <h1>Update Property</h1>

    <div class="container"> 

<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
  <fieldset>
  
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Owner Name</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control"  placeholder="Name Of Property Owner" value="<?php echo"{$info['name']}"?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Property price</label>
      <div class="col-lg-10">
        <input type="text" name="monthly" class="form-control"  placeholder="Price of property" value="<?php echo"{$info['monthly']}"?>">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-10">
        <!-- //added input  -->
        <input type="text"
        <textarea class="form-control" name="address" rows="3" value="<?php echo"{$info['address']}"?>"id="textArea" placeholder="Address"></textarea>
        
      </div>
  </div>




      <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Contact info</label>
      <div class="col-lg-10">
        <input type="text" name="contactno" class="form-control"  placeholder="Number and Email" value="<?php echo"{$info['contactno']}"?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Floor Space</label>
      <div class="col-lg-10">
        <input type="text" name="floor" class="form-control"  placeholder="Floor Space" value="<?php echo"{$info['floor']}"?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Current status</label>
      <div class="col-lg-10">
        <input type="text" name="utility" class="form-control"  placeholder="Utility" value="<?php echo"{$info['utility']}"?>" >
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label >
      <div class="col-lg-10">
        <input type="text" 
        <textarea class="form-control" name="descrip" rows="3" id="textArea" value="<?php echo"{$info['descrip']}"?>" placeholder="About Home"></textarea >
      </div>
  </div>
     
      <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <input class="btn btn-success" type="submit" name="update" value="Update" >
      </div>
    </div>

   </center>
   </fieldset>
   </form>

  </div>
  </div>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php  include 'footer.php' ; ?>