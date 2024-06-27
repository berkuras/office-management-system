<?php
$serverName="localhost";
$dbUser="usr";
$dbPwd="";
$dbName="employees";

$cnn=mysqli_connect($serverName, $dbUser, $dbPwd, $dbName);

if (!$cnn)
 {
  die("Failed to connect: " . mysqli_connect_error());
 }
    ?> 