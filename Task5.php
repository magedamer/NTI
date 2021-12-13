<?php



 $json = file_get_contents("http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz");
 //$json = file_get_contents("https://tools.learningcontainer.com/sample-json-file.json");

 $json_data = json_decode($json, true);

 //print_r($json_data);

// echo $json_data -> products_id .'<br>';

foreach ($json_data['data'] as $key => $value) {

    echo $key . '=>' . $value['products_id'] . '<br>';
}

//echo $dataArray['products_id'].'<br>'.$dataArray['products_quantity'].'<br>'.$dataArray['products_model'];

$file = fopen("info.txt","w") or die("can't open this file");

$txt = implode("," , print_r($json_data));

fwrite($file,$txt);

fclose($file);



// $jsonData =   file_get_contents("https://tools.learningcontainer.com/sample-json-file.json");

// $dataArray = json_decode($jsonData,true);

// echo $dataArray['Name'].'<br>'.$dataArray['Mobile'].'<br>'.$dataArray['Boolean'].'<br>';

// echo '**Pets**<br>';

// foreach ($dataArray['Pets'] as $key => $value) {
//     # code...

//     echo '* '.$value.'<br>';
// }

// echo '**Address**'.'<br>';

// foreach ($dataArray['Address'] as $key => $value) {
//     # code...
//     echo    $key.'*'.$value.'<br>';
// }

?>
