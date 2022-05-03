<?php 
$servername = '127.0.0.1';
$username = 'root';
$password = 'qwerty';
$db_name = 'randompicker';

// Create connection
$conn = mysqli_connect($servername,$username,$password,$db_name);

// Ckeck connection

if(!$conn) {
    die("Could not connect to" . mysqli_connect_error());
}






?>