<?php
ob_start();
session_start();
if(isset($_SESSION['member_id'])){
   unset($_SESSION['member_id']);
   unset($_SESSION['member_username']);
   
   header('location: ../index.php');
}

//session_destroy();
?>