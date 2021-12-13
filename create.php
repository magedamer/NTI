<!DOCTYPE HTML>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h2>Write Your Article</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Title :     <input    type="text"     name="title">    <br>
    Content:    <textarea name="content" rows="5" cols="40"></textarea><br>

                 <input type="submit">
    </form>

    <?php

    require 'helper.php';
    require 'dbconnection.php';

     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
        $title        = clean($_POST['title']);
        $content      = clean($_POST['content']);


        if(empty($title))
        {
            echo "The name field is required"  ."<br>";
        }
        if(empty($content))
        {
            echo "The email field is required"  ."<br>";
        }

        $sql = "INSERT INTO blog (title, content)
                VALUES ('$title', '$content')";

        if (mysqli_query($conn, $sql))
         {
             echo "New record created successfully";
         } else
          {
            echo "Error: ". mysqli_error($conn);
           }

     }

    ?>

</body>
</html>
