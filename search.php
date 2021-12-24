<html>
<body>
    <head>
        <title></title>
    </head>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="search" name="search">
    <input type="submit" name="submit">
    </form>
</body>
</html>


<?php
 
    $con= new mysqli("localhost","root","","blog");
    $name = $_post['search'];

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM titles
    WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['first_name'] . " " . $row['last_name'];
        echo "<br>";
}
    mysqli_close($con);
?>

