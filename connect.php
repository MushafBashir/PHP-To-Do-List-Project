<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "to_do_list_project";

$conn = new mysqli($server, $username , $password, $database);

if(!$conn){
     echo "Database connection error";
}




?>