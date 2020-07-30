<?php

// header("Refresh: 15;"); 
include('info.php');

if (!isset($_SESSION['type'])){
    HEADER("LOCATION: ./ajx.html");
}else if($_SESSION['type'] != 'admin'){
    HEADER("LOCATION: ./ajx.html");

}
?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/index.css">
          <link rel="stylesheet" type="text/css" href="css/pic.css">

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
          <span class="mdl-layout-title">All Simple Reservation's</span>
         
      </header>
      <div class="mdl-layout__drawer">
        
      <span class="mdl-layout-title"><div id="meee"> <a href='index.php'> EXPO</a></div></span>
        <nav class="mdl-navigation">
        <?php if(isset($_SESSION['type']) && ($_SESSION['type']=="worker")){
          include ('DefUserOptions.php');
        }        
           else if(isset($_SESSION['type']) && ($_SESSION['type']=="admin")){
            include('AdminOptions.php');
          }else{
echo"You Need To Login First!";
         }
          ?>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <script>
	$(function() {
		$(".preload").fadeOut(500, function() {
			$(".content").fadeIn(0);
		});
	});
</script> 
     <div class="preload">
<div id="mydiv" align="center"><img src="assets/wait.gif" class="ajax-loader"></div>   </div>
		<div align="center">
        Search By Reserver Name:<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter The Reserver Name.." title="Type The Reserver Name">
        &nbsp; &nbsp; &nbsp;Search By Client Name: <input type="text" id="NameInput" onkeyup="SearchByName()" placeholder="Enter The Client Name.." title="Type The Client Name">

    <?PHP
    include("./config.php");
    $workeruid = $_SESSION['uid'];
     $q = mysqli_query($connection, "SELECT	reserve_id,
     product_Code,
      product_Name,
      worker_Full_Name,
        client_FullName,
        client_Phone,   
        reserve_Date,
        reverse_Notes,
        reserve_Quantity,
        product_id,
        reserve_Price FROM products , reserved , clients,workers
        where  reserve_product_id = products.product_id AND reserve_client_id = clients.client_id AND reserve_worker_id=workers.worker_id ")or die("error");
     $t = mysqli_num_rows($q);

     $record_count = mysqli_num_rows($q);

     echo '
    <div class="">
        <div class="panel panel-default">
          <div class="panel-heading no-collapse">  <center>Total Product: <span class="label label-warning">'.$t.'  </center></span></div>
          <table class="table table-bordered table-striped" id="productTable">
              <thead>
                <tr>
                <th>ID</th>
                <th>Reserver Name</th>

                <th>Client Full Name</th>
                <th>client Phone</th>
                <th>Product Code</th>
                <th>Product Name</th>
                  <th>Rv.Date</th>
                  <th>Rv.Quantity</th>
                  <th>Rv.Notes</th>
                  <th>Reserve Price</th>
                  
                  


                </tr>
              </thead>
              <tbody>';
  while($row = mysqli_fetch_assoc($q)){
              echo '<tr id="'.$row['reserve_id'].'">

              <td>'.$row['reserve_id'].'</td>
              <td>'.$row['worker_Full_Name'].'</td>

                  <td>'.$row['client_FullName'].'</td>
                  <td>'.$row['client_Phone'].'</td>

                  <td id='.$row['reserve_id'].'>'.$row['product_Code'].'</td>
                  <td>'.$row['product_Name'].'</td>

                  <td>'.$row['reserve_Date'].'</td>
                  <td>'.$row['reserve_Quantity'].'</td>
                  <td>'.$row['reverse_Notes'].'</td>
                  <td>'.$row['reserve_Price'].'</td>



                  <td> <input type="button" id='.$row['reserve_id'].' onclick="deleterv(this.id,'.$row['reserve_Quantity'].','.$row['product_id'].')" value="Delete">
                  <td> <input type="button" id='.$row['reserve_id'].' onclick="confirmrv(this.id)" value="Confirm">

                  </td>'; }

                  

?>


<script>
  function deleterv(x,Qt,Pid){
    x=confirm("Are You Sure Want To Cancel This Reservation!.\nYou Cannot Undo After This!\nThe Quantity Will Return To The Product As Available");
    if(x){ 
   var reservationID=x;
   var Quantity = Qt;
   var productID= Pid;

   var xmlhttp;
if(window.XMLHttpRequest){ 
xmlhttp = new XMLHttpRequest(); 

}
else {console.log("NO XML HTTP REQUEST IN THIS PAGE")       }
xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState == 4 & xmlhttp.status ==200)
console.log("On Ready State Change")
}
xmlhttp.open("GET","./Functions.php?deleterv="+reservationID+"&qt="+Quantity+"&pid="+Pid,false);
xmlhttp.send();

  }
  }
  function confirmrv(x){
    alert("This Button Is Not Programmed ! \n")

  }
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function SearchByName() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("NameInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
		</div>
      </main>
    </div>
  </body>
</html>