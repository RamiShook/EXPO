<?php  

session_start();

 require('config.php');

if (isset($_GET['username']) and isset($_GET['password'])){
	
// Assigning POST values to variables.
$username = $_GET['username'];
$password = $_GET['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `workers` WHERE worker_Uname='$username' and worker_Pass='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "welcome ".$username ;
$_SESSION['USERNAME']=$username;


// to get the user username and the user type
$UN="SELECT worker_id ,worker_Full_Name,worker_Uname , worker_Type FROM `workers` WHERE worker_Uname='$username'";
$rs=mysqli_query($connection,$UN);
$rows=mysqli_num_rows($rs);
if ($rows==1){
			        $_SESSION["un"]=$username;

	while($any= mysqli_fetch_array($rs)){
				$_SESSION["name"]=$any["worker_Full_Name"];
				$_SESSION["type"]=$any["worker_Type"];
				$_SESSION["uid"]=$any["worker_id"];
	}
	header("refresh:2; url=/index.php");
}
}else{
echo "Some info Is Wrong Please Try Again";
//echo "Invalid Login Credentials";
}
}
?>