<?php 
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "crud";

$con = mysqli_connect($hostname, $username, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>