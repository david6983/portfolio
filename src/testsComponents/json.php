<?php 
$myObj = new \stdClass();
$myObj->name = "John";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

header('Content-Type: application/json');
echo $myJSON;
print_r(json_decode($myJSON));

?>