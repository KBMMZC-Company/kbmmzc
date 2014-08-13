<meta charset="utf-8">
<?php
//include_once 'connectDB.php';
include_once 'db.php';
$db = new db();
$conn = $db->connect();

if($conn){
   echo "connect complete";
} else {
   echo "connect fail";
}

$result = mysqli_query($conn, "SELECT * FROM member");

echo "<br>";

while ($row = mysqli_fetch_array($result)) {   
   echo $row['member_id'] . " " . $row['member_name'];
   echo "<br>";
}

mysqli_close($conn);
?>