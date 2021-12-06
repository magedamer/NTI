<?php

// this finction to print next charcter
function printNextChar($char)
{
    $next_char = ++$char ;

    if(strlen($next_char > 1)) // create this condition because when write 'z' it print 'aa'
    {
        $next_char = $next_char[0];
    }

     return $next_char;
}

 echo printNextChar("a");

?>