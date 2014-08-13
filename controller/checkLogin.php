<?php

ob_start();
session_start();

include_once '../config/db.php';

$db = new db();

$attributes = array(
    'member_username =' => $_POST[txt_username],
    'member_password =' => $_POST[txt_password]
);

$row = $db->findByAttributes('member', $attributes)
        ->execute();

if (!empty($row)) {
   while ($r = mysqli_fetch_array($row)) {
      $_SESSION['member_id'] = $r['member_id'];
      $_SESSION['member_username'] = $r['member_username'];
      //echo $r['member_id'];
      header('location: ../index.php');
   }
} else {
   echo 'username or password invalid';
   //echo mysql_error();
}
?>