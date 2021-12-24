
<?php
require('database.php');
$res = $database->read();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in PHP & MySQL - Read</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Content</th>
				<th>Image</th>
			</tr>
			<?php
			while($r = mysqli_fetch_assoc($res)){
			?>
			<tr>
				<td><?php echo $r['id']; ?></td>
				<td><?php echo $r['title']; ?></td>
				<td><?php echo $r['content']; ?></td>
				<td><?php echo $r['image']; ?></td>
				<td><a href="update.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>
