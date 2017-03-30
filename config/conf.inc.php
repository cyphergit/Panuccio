<?php
//Database credentials
$host       = "localhost";
$user       = "root";
$password   = "sa";
$database   = "Panuccio";

//$host       = "192.168.45.182";
//$user       = "u1905_pAdmin";
//$password   = "okcacp)4nlelei.kstrem";
//$database   = "db1905_panuccio";

//Connect to database
$connect = mysqli_connect($host, $user, $password, $database);

//Check for database connection error
if (mysqli_connect_errno()) {
    echo "Failed to connect to database " . mysqli_connect_errno();
    exit();
}