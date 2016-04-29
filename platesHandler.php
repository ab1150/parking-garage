<?php
$results = fopen("plate.txt","w");
$input = file_get_contents("php://input");
fwrite($results,"$input");
fclose($results);
$results = fopen("plate.txt","r");
$parsedInput = json_decode(fread($results,filesize("plate.txt")), true);
$plate = $parsedInput['results'][0]['plate'];
fclose($results);
$results = fopen("plate.txt","w");
fwrite($results, "$plate");
fclose($results);
?>
