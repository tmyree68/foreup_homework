<?php

//marveldb.php;

$conn = new PDO("mysql:host=localhost; dbname=foreUp_db", "root", "Claire@12");

$received_data = json_decode(file_get_contents("php://input"));

print_r($received_data);
$data = array();

if($received_data->the_image_name != '')
{
    $the_image_name = $_POST['the_image_name'];

    $sql = ("SELECT * FROM foreup_homework WHERE upper(character_name)=upper('$the_image_name')");
    if($conn->query($sql) === TRUE){

        echo "The character name you have chosen already exists!";

        exit;
    }

    $sql = "INSERT INTO foreup_homework (character_name) VALUES ('$received_data->the_image_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //$conn->close();
}
?>