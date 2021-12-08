<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  <label>Name:</label>
  <input type="text"      name="name"><br>
  <label>E-Mail:</label>
  <input type="email"     name="email"><br>
  <label>Password:</label>
  <input type="password"  name="password"><br>
  <label>Address:</label>
  <input type="text"      name="address"><br>
  <label>LinkidIn:</label>
  <input type="url"       name="linkidin"><br>

  <input type="file"      name="image"><br>
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>


<?php


session_start();

function clean($input)
{
    return strip_tags(trim($input));
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
        $name       = clean($_POST['name']);
        $email      = clean($_POST['email']);
        $password   = clean($_POST['password']);
        $address    = clean($_POST['address']);
        $linkidIn   = clean($_POST['linkidin']);


        // check name
        if(empty($name))
        {
            echo "The name is required" ."<br>";
        }

        //check email
        if(empty($email))
        {
            echo "The email is required"  ."<br>";
        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is a valid email address"."<br>");
          } else {
            echo("$email is not a valid email address"."<br>");
          }
          
          // sanitize email
          $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        //check password
        if(empty($password))
        {
            echo "password required"."<br>" ;

        }elseif(strlen($password) < 6)
        {
          echo "password must be > 6 chars" ."<br>";
        }

        // check address
        if(empty($address))
        {
            echo "address is required"."<br>";
        }elseif(strlen($address) == 10)
        {
          echo "valid" ."<br>";
        }else
        {
          echo "Not Valid" ."<br>";
        }


        // check linkidIn
        if(empty($linkidIn))
        {
          echo "linkidin required" ."<br>";
        }elseif(filter_var($linkidIn,FILTER_VALIDATE_URL))
        {
          echo "linkidin is valid" ."<br>";
        
        }else
        {
          echo"linkidin not valid" ."<br>";
        }


        //check file
        if(!empty($_FILES['image']['name'])){

          $tmpPath    =  $_FILES['image']['tmp_name'];
          $imageName  =  $_FILES['image']['name'];
      
           

          $exArray   = explode('.',$imageName);
          $extension = end($exArray);

          $FinalName = rand().time().'.'.$extension;

          $allowedExtension = ["png",'jpg'];

           if(in_array($extension,$allowedExtension)){
                

              $desPath = './uploads/'.$FinalName;

               if(move_uploaded_file($tmpPath,$desPath)){
                   echo 'Image Uploaded';
               }else{
                   echo 'Error In Uploading file';
               }


           }else{
               echo 'Not Allowed Extension .... ';
           }

       }else{
           echo 'Image Field Required';
       }

}else
{
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['passwoed']=$password;
        $_SESSION['address']=$address;
        $_SESSION['linkidin']=$linkidIn;
        $_SESSION['image'] =$exArray;

         

        header("Location: profile.php");

}



?>