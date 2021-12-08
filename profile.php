<?php

session_start();

if(isset($_SESSION['name']) && isset($_SESSION['email'])&& isset($_SESSION['password'])&& isset($_SESSION['address'])&& isset($_SESSION['linkidin'])&& isset($_SESSION['image']) )

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




?>