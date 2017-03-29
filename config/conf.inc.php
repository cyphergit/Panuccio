<?php
//Database credentials
$host       = "localhost";
$user       = "root";
$password   = "sa";
$database   = "Panuccio";

//Connect to database
$connect = mysqli_connect($host, $user, $password, $database);

//Check for database connection error
if (mysqli_connect_errno()) {
    echo "Failed to connect to database " . mysqli_connect_errno();
    exit();
}