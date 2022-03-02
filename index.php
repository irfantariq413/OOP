<?php

require('connection.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<br>
<div class="container">
<h1 class="text-primary text-uppercase text-center">AJAX CRUD OPERATION</h1>
<div class="d-flex justify-content-end">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>
</div>


<h2 class="text-danger">All Records</h2>
<div id="records_contant">
	
</div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="form-group">
       	<label>First Name:</label>
       	<input type="text" name="" id="c_name" class="form-control" placeholder="Enter Company Name">
       </div>
       <div class="form-group">
       	<label>Last Name:</label>
       	<input type="text" name="" id="c_person" class="form-control" placeholder="Enter Person Name">
       </div>
       <div class="form-group">
       	<label>Mobile:</label>
       	<input type="text" name="" id="number" class="form-control" placeholder="Enter Mobile Number">
       </div>
       <div class="form-group">
       	<label>Address:</label>
       	<input type="text" name="" id="email" class="form-control" placeholder="Enter Email Address">
       </div>
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="addRecord()">Save</button>
     
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
		function myfunc(){
			
			$.ajax({
				url:"ajax.php",
			type:"post",
			success:function(result,status){
				$("#irfan2").html(result);
			}
			})
		}
	
	
	$(document).ready(function(){
		readRecords();
	});
	
	function readRecords(){
		var readrecord="readrecord";
		$.ajax({
			url:"show.php",
			type:"post",
			data:{
				readrecord:readrecord
			},
			success:function(result,status){
				$("#records_contant").html(result);
			}
		})
	}
	
	function addRecord(){
		var firstname = $('#c_name').val();
		var lastname = $('#c_person').val();
		var mobile = $('#number').val();
		var address = $('#email').val();
		
		$.ajax({
			url:"show.php",
			type:"post",
			data:{
				firstname:firstname,
				lastname:lastname,
				mobile:mobile,
				address:address
			},
			success: function(data,status){
				readRecords();
			}
		})
	}
	
	function DeleteUser(deleteid){
		
		var conf= confirm(" Are you Sure! ");
		
		if(conf==true){
			
		$.ajax({
			url:"show.php",
			type:"post",
			data:{
				deleteid:deleteid
			},
			success:function(result,status){
				readRecords();
			}
		})
	}
	}
	
	</script>
</body>
</html>