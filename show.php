<?php

require('connection.php');


if(isset($_POST['readrecord'])){
	echo '<table class="table table-bordered table-striped">
	<tr>
	<th>No</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Mobile</th>
	<th>Address</th>
	<th>City</th>
	<th>Edit</th>
	<th>Delete</th>
	</tr>
	';
	$display= "SELECT * from user";
	$res=mysqli_query($con,$display);
	if(mysqli_fetch_row($res)>0){
		$number=1;
		while($row=mysqli_fetch_assoc($res)){
			echo '<tr>
			<td>' .$number. '</td>
			<td>'.$row['fname'].'</td>
			<td>'.$row['lname'].'</td>
			<td>'.$row['mobile'].'</td>
			<td>'.$row['address'].'</td>
			<td>'.$row['city'].'</td>
			<td><button onClick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button></td>
			<td><button onClick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button></td>
			</tr>
			
			';
			$number++;
		}
	}
	echo '</table>';
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['city'])) {
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$qq="INSERT into user (fname,lname,mobile,address,city) values ('$firstname','$lastname','$mobile','$address','$city')";
		mysqli_query($con,$qq);
}

if(isset($_POST['deleteid'])){
	
	$userid=$_POST['deleteid'];
	
	$delete= "DELETE from user where id='$userid'";
	mysqli_query($con,$delete);
}
?>