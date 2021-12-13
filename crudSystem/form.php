<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>BLOG</title>
  </head>
  <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
              <label>TITLE:</label>
              <input type="text" name="title"><br>
              <label>CONTENT:</label>
              <textarea name="content" cols="40" rows="5"></textarea><br>
              <input type="file" name="image" ></br>
             <input type="submit" name="insert" value="INSERT"><input type="submit" name="update" value="UPDATE"><input type="submit" name="select" value="SELECT">
        </form>

  </body>
</html>

<?php

  require 'validation.php';
  require 'dbconnection.php';

 # SELECT DATA ..........................
       if(isset($_POST['select']))
         {
           //$id = $_GET['id'];
           $sql_select = "SELECT * FROM titles where ORDER BY id" ;
           $rows =  mysqli_query($conn ,$sql_select);

           if(mysqli_num_rows($rows) > 0)
            {

            $data = mysqli_fetch_assoc($rows);

          }
        }

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
       $title   = clean($_POST['title']);
       $content = clean($_POST['content']);
       $tmpPath = $_FILES['image']['tmp_name'];
       $imgContent = addslashes(file_get_contents($tmpPath));

         echo validate();
     // insert data ..............................
         $sql_insert = "INSERT INTO titles (title, content,image)
                         VALUES ('$title', '$content', '$imgContent')";

         if (mysqli_query($conn, $sql_insert))
          {
              echo "New record created successfully";
          } else
           {
             echo "Error: ". mysqli_error($conn);
           }

    // select data .............................




  }

 ?>



// <?php
//       echo "<h2>Your Input:</h2>";
//       echo $title;
//       echo "<br>";
//       echo $Content;
//       echo "<br>";
//       echo "<img src="">";
//       echo "<br>";
//
// ?>
