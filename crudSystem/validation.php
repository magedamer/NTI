<?php


   # clean data .........
     function clean($data)
     {
         $data = trim($data);
         $data = stripslashes($data);
         $data = strip_tags($data);
         $data = htmlspecialchars($data);

       return $data ;
     }

   # validata data ..........


   function validate()
   {

     $title = $content = $image = "";

  // validate title ..............
     if(empty($_POST['title']))
     {
          echo "Title is required".'<br>';
     }elseif(strlen($_POST['title']) > 6 ) {

          $title = clean($_POST['title']);

     }else {
          echo "Title must be > 6".'<br>';
     }

  // validate content ..............

     if(empty($_POST['content']))
       {
           echo "Content is required".'<br>';

      }elseif(strlen($_POST['content']) > 20 ) {

           $title = clean($_POST['title']);

      }else
       {
          echo "Content must be > 20".'<br>';
       }

 // validate image ..............

      if(!empty($_FILES['image']['name']))
      {

         $tmpPath    =  $_FILES['image']['tmp_name'];
         $imageName  =  $_FILES['image']['name'];


         $exArray   = explode('.',$imageName);
         $extension = end($exArray);

         $FinalName = rand().time().'.'.$extension;

         $allowedExtension = ["png","jpg","jpeg","gif"];

         if(in_array($extension,$allowedExtension))
         {

                 echo 'Image Uploaded'.'<br>';
         }else
         {

             echo 'Not Allowed Extension .... ';
         }

     }else{
         echo 'Image Field Required';
     }

   }

 ?>
