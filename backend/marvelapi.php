<?php


// To create a new TimeStamp
$date = new DateTime();
$timestamp=$date->getTimestamp();

//Add your keys here. It would be better if you include them from an external file in production.
$keys="352771dab9ee2451221b4cebc94c4bb870f023dc"."b3234bbc92bd4663f4a3f556cf61ee81";
// Add the timestamp to the keys
$string=$timestamp.$keys;
//Generate MD5 digest, also hash is faster than md5 function
$md5=hash('md5', $string);
$myapikey="b3234bbc92bd4663f4a3f556cf61ee81";

// create a new cURL resource
$ch = curl_init();

$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);
$the_character_name_received = $data['theCharacter'];

$the_array_of_names = array();

//echo('$the_character_name_received');

//Make API call

curl_setopt($ch, CURLOPT_URL, "http://gateway.marvel.com:80/v1/public/characters?ts=$timestamp&apikey=$myapikey&hash=$md5&name=$the_character_name_received");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json')
);
// grab URL and pass it to the browser

 //Execute curl
$output= curl_exec($ch) or die(curl_error());
$return_data = json_decode($output,true);

$the_size = "standard_large.jpg";
$output = $return_data['data']['results'][0]['thumbnail']['path'];
//$output = "$output"."/".$the_size;
//$theCharacterImg = $return_data['thumbnail'];
echo($output."/".$the_size);
//var_dump(json_decode($output,true));

//Format JSON output
//echo str_replace('\\/', '/', $output);
// close cURL resource, and free up system resources
curl_close($ch);
?>