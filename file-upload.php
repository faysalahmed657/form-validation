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
	if(isset($_POST['upload'])){
		$file = $_FILES['photo'];

		$file_name= $file['name'];
		$file_tmpname= $file['tmp_name'];
		$file_size= $file['size'];

		//file size maintain
		$kbSize= $file_size/1024;

		//Get Extension
		$file_arr= explode('.', $file_name);
		$extension = end($file_arr);

		//unique file name
		$unique_name_pro = time().rand(1,999999).$file_name;
		$unique_name = md5($unique_name_pro).'.'.$extension;

		//file validation
		if(empty($file_name)){
			$msg = "<p class = \" alert alert-danger\">Select a valid file<button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}
		else if(in_array($extension,['jpg','png','jpeg','gif'])== false){
			$msg = "<p class = \" alert alert-warning\">Invalid File Format<button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}
		else if($kbSize>500){
			$msg = "<p class = \" alert alert-warning\">File is too large<button class= \"close \" data-dismiss=\"alert\">&times;</button></p>";
		}
		else{
			move_uploaded_file($file_tmpname, 'Photos/'. $unique_name);
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
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					<div class="form-group">
						<img id="upload_photo" src="" alt="" style="max-width: 100%;">
					</div>
                    <label for="file_upload"><img style="cursor:pointer;" data-toggle="tooltip" data-placement="right" src="image.png" alt="" width="100"></label>
                    <input name="photo" style="display:none;"type = "file" id="file_upload">
                    <div class="form-group">
                    <input name="upload" class="btn btn-sm btn-success" type = "Submit" value="Upload Now">
                    </div>
						

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
    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip()

        })

		$('input[name="photo"').change(function(e){
			let file_url= URL.createObjectURL(e.target.files[0]);
			$('img#upload_photo').attr('src', file_url);
		});
    
    </script>
</body>
</html>