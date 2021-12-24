<?php
 require('database.php');

 $id = $_GET['id'];
 $res = $database->read($id);
 $r = mysqli_fetch_assoc($res);
 if(isset($_POST) & !empty($_POST))
 {
	 $title   = $database->sanitize($_POST['title']);
	 $content = $database->sanitize($_POST['content']);
	 $image   = $database->sanitize($_POST['image']);

	 $res = $database->update($title, $content, $image, $id);
	 
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in PHP & MySQL - Update</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

</head>
<body>
<div class="container">
	<div class="row">
<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
	<h2>Update Operation in CRUD Application</h2>
	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Title</label>
	    <div class="col-sm-10">
	      <input type="text" name="title"  class="form-control" id="input1" value="<?php echo $r['title'] ?>" placeholder="Enter Title" />
	    </div>
	</div>

	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Content</label>
	    <div class="col-sm-10">
	      <input type="text" name="content"  class="form-control" id="input1" value="<?php echo $r['content'] ?>" placeholder="Enter content" />
	    </div>
	</div>

	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Image</label>
	    <div class="col-sm-10">
	      <input type="file" name="image"  class="form-control" id="input1" value="<?php echo $r['image'] ?>" />
	    </div>
	</div>


	<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />

</form>
	</div>
</div>
</body>
</html>
