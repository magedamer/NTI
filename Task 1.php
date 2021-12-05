<?php

$units = 150;

if ($units > 0 && $units <= 50) {
	
	echo "Your electricity bill is: " . (3.50 / $units);
} elseif ($units > 50 && $units <= 150) {
	
	echo "Your electricity bill is: " . (4.00 / $units);
}elseif ($units > 150) {
	
	echo "Your electricity bill is: " . (6.50 / $units);
}else{
	
	echo "Your electricity bill is error";
}


?>