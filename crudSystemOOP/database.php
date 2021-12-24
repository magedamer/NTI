
<?php

// database connection classs
 class Database{

    private $connection;

    function __construct()
    {
      $this->connect_db();
    }

    public function connect_db()
    {
      $this->connection = mysqli_connect('localhost','root','','blog');
      if(mysqli_connect_error())
      {
        die("Database connection failed" . mysqli_connect_error());
      }
    }

    public function create($title,$content,$image)
    {
      	$sql = "INSERT INTO `titles` (title, content, image) VALUES ('$title', '$content', '$image')";
        $res = mysqli_query($this->connection, $sql);

        if($res)
        {
	 		     echo "Record Inserted";
		    }else
        {
			     echo "ERROR";
		    }
    }

    public function read($id = null)
    {
      $sql = "SELECT * FROM `titles`";
      if($id)
      {
        $sql .= " WHERE id=$id";
      }
      $res = mysqli_query($this->connection, $sql);

      return $res;
    }

    public function update($title,$content,$image, $id)
    {
		  $sql = "UPDATE `titles` SET title='$title', content='$content', image='$image' WHERE id=$id";
		  $res = mysqli_query($this->connection, $sql);
		  if($res)
      {
			 echo "Record Updated";
		  }else
      {
			 echo "ERROR";
		  }
    }

      public function delete($id)
      {
  		  $sql = "DELETE FROM `titles` WHERE id=$id";
   		  $res = mysqli_query($this->connection, $sql);
   		  if($res)
        {
   			  echo "Record Deleted";
   		  }else
        {
   			  echo "ERROR";
   		  }
  	   }

       public function sanitize($var)
       {
		     $return = mysqli_real_escape_string($this->connection, $var);
		     return $return;
	     }

 }
$database = new Database();
//$database->connect_db();

 ?>
