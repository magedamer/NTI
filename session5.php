<!DOCTYPE html>
<html>
<body>

<form action="<?php   ECHO $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
  <label>Title:</label>
  <input type="text"       name="title"><br>
  <label>Content:</label>
  <input type="text"       name="content"><br>

  <input type="submit"    name="submit">
</form>

</body>
</html>


<?php

$errors = 0;

function clean($input)
{
    return strip_tags(trim($input));
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        $title        = clean($_POST['title']);
        $content      = clean($_POST['content']);
      

        
        // check title
        if(empty($title))
        {
            echo "The name is required" ."<br>";
            $errors = 1;
        }

        //check content
        if(empty($content))
        {
            echo "The email is required"  ."<br>";
            $errors = 1;
        }elseif (strlen($content) > 50) {
            echo($content." must be < 50 chars"."<br>");
            $errors = 1;
          }elseif($errors == 0)
          {
        
            $text = $title . "||" . $content ;
              // create cookie
            setcookie("title" ,$text,time() +(86400 * 1),"/");
            //setcookie("conten"," ",time() + (86400 * 1),"/");

            header("Location:  outputcookie.php");
        
          } 
          
  }




?>