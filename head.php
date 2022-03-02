<?php

require('connection.php');

if(isset($_POST['readrecord'])){
	$q="SELECT * from user";
	$res=mysqli_query($con,$q);
	while($a=mysqli_fetch_assoc($res)){
	?>	
	
	<tr>
		<td><?php echo $a['fname'];    ?></td>
		<td><?php echo $a['lname'];    ?></td>
		<td><?php echo $a['mobile'];    ?></td>
		<td><?php echo $a['address'];    ?></td>
		<td><?php echo $a['city'];    ?></td>
	</tr>
	<?php
	}
}

	if(isset($_POST['submit'])){
		
	     $fname=$_POST['fname'];
	     $lname=$_POST['lname'];
	     $mobile=$_POST['mobile'];
	     $address=$_POST['address'];
	     $city=$_POST['city'];
		
		$qq="INSERT into user (fname,lname,mobile,address,city) values ('$fname','$lname','$mobile','$address','$city')";
		mysqli_query($con,$qq);
		
	}
	
if(isset($_POST['deleteid'])){
	$userid= $_POST['deleteid'];
	
	$query= "DELETE from user where id= '$userid'";
	 mysqli_query($con,$query);

}
	?>