
<?php
// if(!isset($_COOKIE['title'])) {
//   echo "Cookie is not set!";
// } else {
//   echo "Value is: " . $_COOKIE['title'];
// }


//echo date_default_timezone_get();
    date_default_timezone_set('africa/cairo');
    echo date('Y/m/d h:i:s a').'<br>';
    echo date_default_timezone_get();

?>