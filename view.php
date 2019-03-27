<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>CSE-14 Batch</h2>
  <h2>All Student Information: </h2>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student_id</th>
        <th>Student_name</th>
        <th>Adress</th>
		<th>Phone_number</th>
		<th>Delete</th>
		<th>Edit</th>
      </tr>
    </thead>
    <tbody>
	<?php
		if(isset($_GET['delete'])){
			$delete=$_GET['delete'];
		$dq="Delete from student_information where Id='$delete'";
	    mysqli_query($con,$dq);
		}
		
	
	
	
	
	?>
      <?php
	    
		$query="select * from student_information";
		$view_data=mysqli_query($con,$query);
	  $data=mysqli_fetch_all($view_data,MYSQLI_ASSOC);
	  
	  ?>
	  <?php
		
		foreach ($data as $show):?>
		<tr>
			<td><?php echo $show['Id'];?></td>
			<td><?php echo $show['Name'];?></td>
			<td><?php echo $show['Address'];?></td>
		    <td><?php echo $show['Phone_Number'];?></td>
			<td><a href="?delete=<?php echo $show['Id'];?>" class="btn btn-danger">Delete</a></td>
			<td><a href="?edit=<?php echo $show['Id'];?>"class="btn btn-primary">Edit</a></td>
		
		</tr>
		<?php endforeach;?>
      
    </tbody>
  </table>
  <?php
	
	if(isset($_POST['update'])){
		$upname=$_POST['update_name'];
		$upaddress=$_POST['update_address'];
		$upnumber=$_POST['update_number'];
		$editid=$_GET['edit'];
		$query1="update student_information set Name='$upname',Address='$upaddress',Phone_Number='$upnumber' where Id='$editid' ";
		mysqli_query($con,$query1);
		
	}
	
  
  
  
  ?>
  <?php
	if(isset($_GET['edit'])):
	$edit=$_GET['edit'];
	$query="select * from student_information where id='$edit'";
	$update=mysqli_query($con,$query);
	$updateall=mysqli_fetch_all($update,MYSQLI_ASSOC);
	
	foreach($updateall as$value ):
  
  ?>
  <form action="" method="post">
<table>
	<tr>
		<th><label for="">Student_Name :</label></th>
		<th><input type="text" name="update_name" value="<?php echo $value['Name'];?>"/></th>
	</tr>
	
	<tr>
	<th><label for="">Student_Address :</label></th>
	<th><input type="text" name="update_address"value="<?php echo $value['Address'];?>"/></th>	
	</tr>
	
	<tr>
		<th><label for="">Phone_Number :</label></th>
		<th><input type="text" name="update_number"value="<?php echo $value['Phone_Number'];?>"/></th>	
	</tr>
	<tr>
	<th></th>
	 <td><input type="submit" class ="btn btn-info" name="update" value="Update"></td></tr>
	
</table>
</form>
<?php endforeach;endif;?>
</div>

</body>
</html>