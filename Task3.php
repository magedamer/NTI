<!DOCTYPE HTML>
<html>
<head>
    <title>Validate Form</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Name :    <input type="text"     name="name">    <br>
    Email:    <input type="text"     name="email">   <br>
    Password: <input type="password" name="pass">    <br>
    Address : <input type="text"     name="address">  <br>
    Linkidun: <input type="text"     name="linkidin"><br>
              <input type="submit">
    </form>

    <?php
    
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
        $name       = $_POST['name'];
        $email      = $_POST['email'];
        $password   = $_POST['pass'];
        $address    = $_POST['address'];
        $linkidin   = $_POST['linkidin']; 
        

        if(empty($name))
        {
            echo "The name field is required"  ."<br>";
        }
        if(empty($email))
        {
            echo "The email field is required"  ."<br>";
        }
        if(empty($password))
        {
            echo "The password field is required"  ."<br>";
        }
        if(empty($address))
        {
            echo "The address field is required"  ."<br>";
        }

        if(empty($linkidin))
        {
            echo "The linkidin field is required"  ."<br>";
        }

        if(strlen($password) < 6)
        {
            echo "password must be > 6 chars" ."<br>";
        }

        if(strlen($address) > 10)
        {
            echo "address must be = 10 chars" ."<br>";
        }


     }
    
    ?>

</body>
</html>