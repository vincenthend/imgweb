<?php
	function connect(){
		$server = "localhost";
		$user = "root";
		$password = "";
		$db = "db_img";
	
	  $db = new MySQLi($server,$user,$password,$db);
		return $db;
	}
?>