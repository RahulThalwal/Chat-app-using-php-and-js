<?php 

$servername ="localhost";
$database="chatapp_db";
$username="root";
$password="";


$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error){
 die("Connection failed" .$conn->connect_error);
} 
echo "Connected sucessfully";




?>