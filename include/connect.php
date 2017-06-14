<?php
	function connect(){
		$server = "localhost";
		$user = "root";
		$password = "";
		$db = "db_img";
		$port = 3306;

	  $db = new MySQLi($server,$user,$password,$db,$port);
	  if($db->connect_error){
	      die("Connection failed: ".$db->connect_errno);
      }
      else{
          return $db;
      }
	}
?>