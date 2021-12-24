<?php


function Clean($input){

     return   strip_tags(trim($input));
}



function validate($input,$flag){

     $status = true;
    switch ($flag) {
        case 1:
            # code...
              if(empty($input)){
                  $status = false;
              }
            break;

        case 2:
        # code ...
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        }
        break;


        case 3:
        # code ...
        if(strlen($input) < 6){
            $status = false;
        }
        break;

        case 4:
        # code ...
        if(strlen($input) < 20){
            $status = false;
        }
        break;


        case 5:
        # code ...
        if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
        }
        break;

       case 6: 
       #code ....
       $allowedExtension = ["png",'jpg'];
       if(!in_array($input,$allowedExtension)){
           $status = false;
       }
       break;
    }

    return $status ;
}





function url($url){

 return   "http://".$_SERVER['HTTP_HOST']."/group9/week2/".$url;

}

?>
