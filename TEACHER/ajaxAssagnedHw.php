<?php



$user = $_POST['user'];



$path = "../USERS_HW/" . $user . "/workfile.json";

$aFile = file_get_contents($path);
$file1 = json_decode($aFile);

echo json_encode($file1);

?>