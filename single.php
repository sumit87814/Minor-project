<?php include 'header.php';
error_reporting(0);
?>

<?php

$mysqli=new mysqli('localhost','root','','property');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['posts'])){

	$id=$_GET['posts'];
	$query2= "SELECT * FROM propety where id='$id'";
	$readd=$mysqli->query($query2);

}

?>

<style type="text/css">
	
.rooms img{
	width: 300px;
	height: 300px;
  /* display:flex; */
}

</style>
<div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Address</th>
       <th>Contact </th>
      <th>Floor Space</th>
      <th>Current status</th>
      <th>Description</th>
      <th>Rooms</th>
    </tr>
  </thead>
  <tbody>
    
  <?php while ($row= $readd->fetch_assoc()) { ?>

    <tr>
      <td> <?php echo $row['address'];  ?></td>
      <td><?php echo $row['contactno'];  ?></td>
      <td><?php echo $row['floor'];  ?></td>
      <td><?php echo $row['utility'];  ?></td>
      <td><?php echo $row['descrip'];  ?></td>
      <td class="rooms">

      		<?php  $image_name="SELECT * FROM propety as p join details as d 
      					on p.id =d.proid where d.proid =".$row['id'];
      					$read1=$mysqli->query($image_name);

      					foreach ($read1 as $value) { ?>

      						<img src="uploads/<?php echo $value['images']; ?>" />
      						
      					<?php  } ?>
      					</td>
    </tr>
<?php   } ?>
  </tbody>
</table> 

</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php  include 'footer.php' ; ?>