<?php
session_start();

 if (isset($_GET['profile'])) {
	 if (isset($_SESSION['USERNAME'])) 
		 header("Location: /index.php "); 
     else
	     header("Location: /ajx.html");

	 }
	 
//  function showinfo(){
//	  $message = "wrong answer";
//echo "<script type='text/javascript'>alert('$message');</script>";
	  
 // }
  
function chkss(){
	 if (isset($_SESSION['USERNAME'])) 

		echo $_SESSION["USERNAME"]; 
	else echo"you didn't login"; 
	
}
?>