<?php

$servername = "localhost";
$email = "root";
$password = "";

$dbname = "dbname";
//Create Connection
$conn = mysqli_connect($servername, $email, $password ,$dbname);
//Check Connection
if (!$conn) {
   die("Connection Failed" . mysqli_connect_error());
} 

try {
   $db = new PDO("mysql:host={$servername};dbname={$dbname}", $email, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
   $e->getMessage();
}
?>