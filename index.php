<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

<?php

	
	
	if(isset($_POST[ 'insert' ])){
		echo $name = $_POST[ 'name' ];
		echo $email = $_POST[ 'email' ];
		echo $cell = $_POST[ 'cell' ];
		echo $username = $_POST[ 'username' ];


		if(empty($name)){
			$err['name'] = "<p style= \"color:red\">*Required</p>";
		}
		if(empty($email)){
			$err['email'] = "<p style= \"color:red\">*Required</p>";
		}
		if(empty($cell)){
			$err['cell'] = "<p style= \"color:red\">*Required</p>";
		}
		if(empty($username)){
			$err['username'] = "<p style= \"color:red\">*Required</p>";
		}

	
		if(empty($name) || empty($email) || empty($cell) || empty($username) ){
		$msg = "<p class = \" alert alert-danger\">All fields are required <button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}
		else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false ){
		$msg = "<p class = \" alert alert-warning\">Invalid Email Address<button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}

		else{
		$msg = "<p class = \" alert alert-success\">Data Stable <button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}
	}
?>



	
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Sign Up</h2>

				<?php
				if(isset($msg)){
					echo $msg;
				}
				?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
						<?php
							if(isset($err['name'])){
								echo $err['name'];
							}
						
						
						
						?>

					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
						<?php
							if(isset($err['email'])){
								echo $err['email'];
							}
	
						?>
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
						<?php
							if(isset($err['cell'])){
								echo $err['cell'];
							}
						?>
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" type="text">
						<?php
							if(isset($err['username'])){
								echo $err['username'];
							}
						?>
					</div>
					<div class="form-group">
						<input name="insert" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>