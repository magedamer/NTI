<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Name:   <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  
  $name  = $_REQUEST['name'];
  $email = $_REQUEST['email'];

  if ((empty($name) && empty($email)) )
   {

    echo "Name or email is empty and email is less than 20 char";

   } else{
    

    echo "name is  : "   . $name."</br>";
    echo "email is : "   . $email;

    }

}

?>

</body>
</html>