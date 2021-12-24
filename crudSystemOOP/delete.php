<?php
  require('database.php');

  $id = $_GET['id'];

  $res = $database->delete($id);
  if($res)
  {
  	header('location: view.php');
  }
?>
