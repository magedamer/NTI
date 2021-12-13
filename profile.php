<?php

session_start();

if(isset($_SESSION['name']) && isset($_SESSION['email']))

{

 echo  $_SESSION['name'].'<br>';
 echo  $_SESSION['email'].'<br>';
 echo  $_SESSION['passwoed'].'<br>';
 echo  $_SESSION['address'].'<br>';
 echo  $_SESSION['linkidin'].'<br>';
 echo  $_SESSION['image'];



}else
{
    echo 'Session Deleted <br>';

}


// session_destroy();




?>