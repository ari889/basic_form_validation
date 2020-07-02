<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Form Validation</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<?php 

	include_once 'functions.php';

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];
		$age = $_POST['age'];

		if(empty($name) || empty($email) || empty($cell) || empty($image) || empty($age)){
			$message = '<div class="alert alert-warning"><strong>Warning!</strong>Field Must not be empty. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button></div>';
		}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$message = '<div class="alert alert-warning"><strong>Warning!</strong>Invalid Email address. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button></div>';
		}else if($age < 20 OR $age > 30){
			$message = '<div class="alert alert-warning"><strong>Warning!</strong>Only 20 to 30 years people are accepted for registration. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button></div>';
		}else if(check_private_email($email) === false){
			$message = '<div class="alert alert-warning"><strong>Warning!</strong>Only gmail and coadertrust mail are accepted. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button></div>';
		}
	}

	 ?>
	<div class="custom_signup">
		<h2 class="text-center">Sign Up</h2>
		<div class="message"><?php if(isset($message)){ echo $message; } ?></div>
		<form method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputName1">Full Name</label>
		    <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" value="<?php old('name'); ?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input name="email" type="text" class="form-control" id="exampleInputEmail1" value="<?php old('email'); ?>">
		  </div>
		   <div class="form-group">
		    <label for="cell">Cell</label>
		    <input name="cell" type="text" class="form-control" id="cell" value="<?php old('cell'); ?>">
		  </div>
		  <div class="form-group">
		    <label for="image">Image</label>
		    <input name="image" type="file" class="form-control" id="image">
		  </div>
		  <div class="form-group">
		    <label for="age">Age</label>
		    <input name="age" type="text" class="form-control" id="age" value="<?php old('age'); ?>">
		  </div>
		  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>