<?php
include('info.php');
if ($_SESSION['type']!="admin"){
    HEADER("LOCATION:./ajx.html");
}
?>
<html>
  <head>
<style>
/* 
.center_div{
    align:center;
    width:80%
} */
</style>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/material.min.css">
<script src="js/material.min.js"></script>
<script src="js/myscripts.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./assets/bootstrap.css">
<script type="text/javascript" src="./assets/jquery.js"></script>
<script type="text/javascript" src="./assets/bootstrap.js"></script>
<script type="text/javascript" src="./assets/bootbox.min.js"></script>
<script type="text/javascript" src="./assets/sorttable.js"></script> 
  </head>
  <body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">User</span>
         
      </header>
      <div class="mdl-layout__drawer">
        
      <span class="mdl-layout-title"><div id="meee"> <a href='index.php'>EXPO</a></div></span>
        <nav class="mdl-navigation">
      <?php if(isset($_SESSION['type']) && ($_SESSION['type']=="worker")){
          include ('DefUserOptions.php');
        }else if(isset($_SESSION['type']) && ($_SESSION['type']=="admin")){
          include ('AdminOptions.php');
        }else{
            include('DefUserOptions.php');
          }
          ?>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
		<div align="center">
    
        <?php
include "./config.php";
$iod = $_GET['id'];
$q = mysqli_query($connection ,"SELECT * FROM workers WHERE worker_id='$iod' ");

$r = mysqli_fetch_assoc($q);


// user not found


global $r;
?>

<div class="alert alert-danger fade in radius-bordered alert-shadowed"><b>Profile Of : <?php echo $r['worker_Uname']; ?></b></div>


<div class="row" align="center" class="align-center">
  <div class="col-md-4" class="align-center">
    <br>
    <div id="myTabContent" class="tab-content" class="align-center">
      <div class="tab-pane active in" id="home" class="align-center">

          <div class="align-center">
      <form id="tab" method="post" align="center" postion="absolute" class="align-center">
        <div class="form-group align-center">
        <label>User Uname(Login)</label>
        <input type="text" value="<?php echo $r['worker_Uname'];?>" class="form-control" name="worker_uname">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="text" value="<?php echo $r['worker_Pass'];?>" class="form-control" name="worker_Password">
        </div>
        <div class="form-group">
        <label>User Name</label>
        <input type="text" value="<?php echo $r['worker_Full_Name'];?>" class="form-control" name="worker_Full_Name">
        </div>
        <div class="form-group">
        <label>User Phone</label>
        <input type="text" value="<?php echo $r['worker_Phone'];?>" class="form-control" name="worker_Phone">
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" value="<?php echo $r['worker_Address'];?>" class="form-control" name="worker_Address">
        </div>
        <input type="submit" class="btn btn-primary" name="op" value="Update" />
        <input type="submit" class="btn btn-danger" name="op" value="Delete" />
        <input type="reset" value="Reset" class="btn btn-reset"/>

        <input type="button" value="Back" class="btn btn-primary" onclick="window.location.replace('./AdminWorkers.php')"/>
        </form> </div>
      </div>
    </div>
  </div>
<?php
if (isset($_POST['worker_uname']) && isset($_POST['worker_Full_Name'])&& isset($_POST['worker_Phone'])){
$user_uname = $_POST['worker_uname'];
$user_name = $_POST['worker_Full_Name'];
$user_phone = $_POST['worker_Phone'];
$user_address = $_POST['worker_Address'];
$user_pass = $_POST['worker_Password'];

$id = mysqli_real_escape_string($connection, $_GET['id']);
if($_POST['op'] and $_POST['op'] == "Update"){
   $qq = mysqli_query($connection, "UPDATE workers SET worker_uname='$user_uname',worker_Full_Name='$user_name',worker_Phone='$user_phone',worker_Address='$user_address',worker_Pass='$user_pass' WHERE worker_id='$id'");
   if($qq){
     echo "<b><font color='green'>Editing Done !!</font></b>";
echo "<script language='javascript'>   location.replace('./AdminWorker.php?id='+ ".$id.") </script>";
   }else{
    echo "<b><font color='red'>Editing Error !!</font></b>";
   }
}else if($_POST['op'] && $_POST['op'] == "Delete"){
   $qq = mysqli_query($connection, "DELETE FROM workers WHERE worker_id='$id'");
   
   if($qq){
     echo "<b><font color='green'>User Deleted !!</font></b>";
   }else{
    echo "<b><font color='red'>User not Deleted !!</font></b>";
   }
}

}

?>
		</div>
      </main>
    </div>

  </body>
</html>