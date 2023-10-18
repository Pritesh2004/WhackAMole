<?php
$server="localhost";
$username="root";
$password="";
$database="whackamole";
$port="3308";

$conn  = mysqli_connect($server,$username,$password,$database,$port);

if(!$conn){
 
    die("Error". mysqli_connect_error());
}
?>