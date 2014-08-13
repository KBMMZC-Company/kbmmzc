<?php
ob_start();
session_start();

echo 'session ons '.$_SESSION['member_username'];
?>