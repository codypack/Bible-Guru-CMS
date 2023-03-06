<?php
$host = 'localhost';
$username = 'onyx5';
$password = 'shalom';
$db_name = 'biblesco'; 
$conn= mysqli_connect($host, $username, $password ,$db_name );
if(!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}
?>