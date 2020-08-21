<?php
header("Refresh: 15;"); 

include('../info.php');
if (!isset($_SESSION['type'])){
    HEADER("LOCATION: ../ajx.html");
}
?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="../css/index.css">
          <link rel="stylesheet" type="text/css" href="../css/pic.css">

		<link rel="stylesheet" href="../css/material.min.css">
<script src="../js/material.min.js"></script>
<script src="../js/myscripts.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/bootstrap.css">
<script type="text/javascript" src="../assets/jquery.js"></script>
<script type="text/javascript" src="../assets/bootstrap.js"></script>
<script type="text/javascript" src="../assets/bootbox.min.js"></script>
<script type="text/javascript" src="../assets/sorttable.js"></script> 
  </head>
  <body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title">Available Products</span>
         
      </header>
      <div class="mdl-layout__drawer">
        
      <span class="mdl-layout-title"><div id="meee"> <a href='index.php'> EXPO</a></div></span>
        <nav class="mdl-navigation">
        <?php if(isset($_SESSION['type']) && ($_SESSION['type']=="worker")){
          include ('../DefUserOptions.php');
        }        
           else if(isset($_SESSION['type']) && ($_SESSION['type']=="admin")){
            include('../AdminOptions.php');
          }else if(isset($_SESSION['type'])&& ($_SESSION['type']=="Fulfillment") ){
            include('FulfOptions.php');
        
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
<div id="mydiv" align="center"><img src="../assets/wait.gif" class="ajax-loader"></div>   </div>
		<div align="center">
        Search By Code:<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter The Code.." title="Type The Product Code">
        &nbsp; &nbsp; &nbsp;Search By Name: <input type="text" id="NameInput" onkeyup="SearchByName()" placeholder="Search By Name.." title="Type The Product Name">

    <?PHP
    include("../config.php");
     $q = mysqli_query($connection, "SELECT * FROM products WHERE product_Quantity > 0 ")or die("error");
     $t = mysqli_num_rows($q);

     $record_count = mysqli_num_rows($q);

     echo '
    <div class="">
        <div class="panel panel-default">
          <div class="panel-heading no-collapse">  <center>Total Available Products: <span class="label label-warning">'.$t.'  </center></span></div>
        

       
         
        
        
          <table class="table table-bordered table-striped" id="productTable">
              <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Size</th>
                  <th>Color</th>
                  <th>Av.Quantity</th>
                  <th>Price</th>
                  <th>Notes</th>
                  <th>photo</th>


                </tr>
              </thead>
              <tbody>';
  while($row = mysqli_fetch_assoc($q)){
              echo '<tr>
                  <td>'.$row['product_Code'].'</td>
                  <td>'.$row['Product_Name'].'</td>
                  <td>'.$row['product_Size'].'</td>
                  <td>'.$row['product_Color'].'</td>
                  <td>'.$row['product_Quantity'].'</td>
                  <td>'.$row['product_Price'].'</td>
                  <td>'.$row['product_Note'].'</td>
                  <td> <img src= "../'.$row['product_photo_path'].'"  class="thumbnailz" height="40px" width="100px" alt="No Available Photo" onerror="this.onerror=null; this.remove();"></img></td>


                  <td> <input type="button" id='.$row['product_Code'].' onclick="dss(this.id)" value="Copy Product Code">


                  <td>'; }
                  echo '<script language="javascript"> 
                  
                  function dss(y){
                    
                      var x=y;
                      var dummy = $("<input>").val(x).appendTo("body").select()
                      document.execCommand("copy");
                    
                    }  </script>
                  
                  '



?>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
</script>
		</div>
      </main>
    </div>
  </body>
</html>