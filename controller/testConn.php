<?php

include_once '../config/db.php';
$db = new db();
$rows = $db->findAll('member')->execute();

if (!empty($rows)) {
   while ($r = mysqli_fetch_array($rows)){
      echo $r['member_id'];
      echo $r['member_name'];
      echo "<br />";
   }
} else {
   //echo mysqli_errno();
   echo mysqli_connect_error();
}
?>