<?php include "details.php"; ?>

<?php
	if(isset($_POST['submit'])){
		include "connect.php";
		$name=$_POST['name'];
		$address=$_POST['address'];
		$pnumber=$_POST['number'];
		
		$query="insert into student_information(name,address,phone_number) values('$name','$address','$pnumber')";
		$result=mysqli_query($con,$query);
		if($result){
			echo "successfully inserted</br>";
		}
		else{
			echo "don't inserted";
		}
	}
    echo "Click here and view all data "."<a href='view.php'>Show</a>";



?>