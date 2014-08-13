<?php
// Create connection
$con=mysqli_connect("localhost","hattori","1712","db_kbmmzc");
mysqli_query($con,'SET NAMES utf-8');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>