<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gyandaan";

$mysqli=$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Fail to connect". mysqli_connect_error());
}

include_once('function.php');
?>
