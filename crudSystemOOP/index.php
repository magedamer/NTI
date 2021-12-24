<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in OOP PHP - Create</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>

<div class="container">
	<div class="row">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Create Operation in CRUD Application</h2>

<!-- title ......................................................................................-->
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Title</label>
			    <div class="col-sm-10">
			      <input type="text" name="title"  class="form-control" id="input1" placeholder="Enter title" />
			    </div>
			</div>

<!-- content .......................................................................................-->
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Content</label>
			    <div class="col-sm-10">
			      <input type="text" name="content"  class="form-control" id="input1" placeholder="Enter content" />
			    </div>
			</div>

<!-- image ...........................................................................................-->
			<div class="form-group" class="file">
			<label for="input1" class="col-sm-2 control-label">Image</label>
			<div class="col-sm-10">
			  <label>
			    <input type="file" name="image" >
			  </label>
			</div>
			</div>


			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" name="submit" />
		</form>
	</div>
</div>
</body>
</html>

<?php

   require('database.php');
	 require('helpers.php');

    if(isset($_POST) & !empty($_POST))
    {
	    $title   = $database->sanitize($_POST['title']);
	    $content = $database->sanitize($_POST['content']);

			$errors = [];

		  # Validate Name
		  if(!validate($title, 1)){
		      $errors['title'] = "Field Required";
		  }elseif (!validate($title, 3)) {
		  	  $errors['title'] = 'length must > 6 chrs';
		  }


		  # Validate Email
		  if(!validate($content, 1)){
		      $errors['content'] = "Field Required";
		  }elseif(!validate($content, 4)){
		     $errors['content'] = "length must > 20 chrs";
		  }

			# Validate image
		  if(!validate($_FILES['image']['name'],1)){
		     $errors['Image'] = "Field Required";
		 }else{

		$tmpPath    =  $_FILES['image']['tmp_name'];
		$imageName  =  $_FILES['image']['name'];
		$imageSize  =  $_FILES['image']['size'];
		$imageType  =  $_FILES['image']['type'];

		$exArray   = explode('.',$imageName);
		$extension = end($exArray);

		$FinalName = rand().time().'.'.$extension;

		$allowedExtension = ["png",'jpg'];

		    if(!validate($extension, 6)){
		      $errors['Image'] = "Error In Extension";
		    }

		 }

		    if(count($errors) > 0){
		        foreach ($errors as $key => $value) {
		            # code...
		            echo '* '.$key.' : '.$value.'<br>';
		        }
		    }else{

		     // db ..........

		     $desPath = './uploads/'.$FinalName;

		    if(move_uploaded_file($tmpPath,$desPath))
				{

					$res = $database->create($title, $content, $FinalName);


		    }else{
		    echo 'Error In Uploading file';
		    }

		    }


    }
?>
