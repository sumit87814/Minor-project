<?php

$mysqli=new mysqli('localhost','root','','property');
	$sql="SELECT * FROM  propety";

    $result=mysqli_query($mysqli,$sql);

?>
<style type="text/css">
	

    body{
        background-image:url("images/home.jpg");
    }
.content{
    margin-left:220px;
}
    
    </style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  
    <title>ADMIN HOME</title>
   <?php
include 'admincss.php';
   ?>


</head>
<body>
<?php
include 'add_sidebar.php';

?>
<center>
<div class="content">
    <h1 >ADMIN PANEL </h1>
    <table class="center" border="10px">
    <tr>
        <th style="padding: 20px; font-size:15px;">NAME</th>
        <th style="padding: 20px; font-size:15px;">PRICE</th>
         <th style="padding: 20px; font-size:15px;">ADDRESS</th>
        <th style="padding: 20px; font-size:15px;">CONTACT</th>
        <th style="padding: 20px; font-size:15px;">FLOOR</th>
        <th style="padding: 20px; font-size:15px;">CURRENT STATUS</th>
        <th style="padding: 20px; font-size:15px;">DESCRIPTION</th>
        <th style="padding: 20px; font-size:15px;">DELETE</th>
        <th style="padding: 20px; font-size:15px;">UPDATE</th>
    
    </tr>
<?php
while($info=$result -> fetch_assoc())
{
?>



    <tr>
        <td style="padding:20px;"><?php echo "{$info['name']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['monthly']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['address']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['contactno']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['floor']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['utility']}";?></td>
        <td style="padding:20px;"><?php echo "{$info['descrip']}";?></td>
        <td style="padding:20px;"><?php echo "<a onClick=\"javascript:return confirm('Are you sureyou want  to Delete this');\" 
        class='btn btn-danger' href=delete.php?propety_id={$info['id']}> Delete</a>";?></td>

        <td style="padding:20px;">
        <?php echo "<a class='btn btn-primary' href=update.php?propety_id={$info['id']}> Update</a>";?></td>

     
    </tr>
    <?php
}
?>
</table>
</center>

</div>
</body>
</html>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php  include 'footer.php' ; ?>