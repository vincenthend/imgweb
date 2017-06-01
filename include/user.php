<?php
	include("connect.php");
	
	class User{
		public $username;
		public $password;
		
		function __construct($username, $password){
			$this->$username = $username;
			$this->$password = $password;
		}
		
		function user_login(){
			$db = connect();
			session_start();
			$username = $db->real_escape_string($username);
			$password = $db->real_escape_string($password); 
		
			$sql = "SELECT username FROM registered natural join user WHERE ((username = '$username' or email='$username') and password = '$password')";
			$result = $db->query($sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$active = $row['active'];
		
			// If result matched $myusername and $mypassword, table row must be 1 row		
			if($result->num_rows == 1) {
				session_register("username");
				$sql = "SELECT username FROM registered natural join freelancer";
				$result = $db->query($sql);
				
				//Write session data
				$_SESSION['username'] = $username;			
				if($result->num_rows == 1){
					$_SESSION['role'] = "frlncr";
				}
				else{
					$_SESSION['role'] = "client";
				}			
				header("location: index.php");
				
				$logged_in = true;
			}
			else {
				$logged_in = false;
			}	
			return $logged_in;
		}
	
		function add_user(){
		
	}


?>