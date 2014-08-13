<?php

class db {

   var $host;
   var $user;
   var $pass;
   var $db_name;
   var $charSet;
   var $sql;

   function __construct() {
      $this->host = 'localhost';
      $this->user = 'hattori';
      $this->pass = '1712';
      $this->db_name = 'db_kbmmzc';
      $this->charSet = 'utf-8';
   }

   function connect() {
      $conn = mysqli_connect($this->host, $this->user, $this->pass);

      if ($conn) {
         mysqli_select_db($conn,$this->db_name);
         mysqli_query($conn,'SET NAMES utf8');
         //mysqli_query('SET NAMES utf8');

      }

      return $conn;
   }
   
   function findAll($tableName) {
      $conn = $this->connect();
      
      if(!empty($conn)){
         $this->sql = 'SELECT * FROM '.$tableName;
         return $this;
      }
      return null;
   }
   
   function execute() {
      $conn = $this->connect();
      
      if(!empty($conn)){
         return mysqli_query($conn,$this->sql);
      }
      
      return null;
   }
   
   function findByAttributes($table,$attributes){
      $this->sql = "SELECT * FROM $table WHERE";
      $count=0;
      
      foreach ($attributes as $k => $v){
         if($count==0){
            $this->sql .= " $k '$v'";
         } else {
            $this->sql .= " AND $k '$v'";
         }
         
         $count++;
      }
      
      return $this;
   }
}

?>