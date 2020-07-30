<?php
//   <th>Photo</th>
//<td><img src= "'.$row['product_photo_path'].' "</img> </td>

//header("Refresh: 15;");
include('info.php');
if (!isset($_SESSION['type'])){
    HEADER("LOCATION: ./ajx.html");
}
$rescounter=1;
global $rescounter;
?>
<html>
  <head>
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
          <span class="mdl-layout-title">Products</span>

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
          Filter By Client Phone, Name, Res Date : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Name,  Phone,  Date(2020-01-01)" title="Type The Client Name , Phone Or Date Code" size="50">
<!--        &nbsp; &nbsp; &nbsp;Search By Name: <input type="text" id="NameInput" onkeyup="SearchByName()" placeholder="Search By Name.." title="Type The Product Name"> -->

    <?PHP
    include("./config.php");
    $wkid=$_SESSION['uid'];
     $q = mysqli_query($connection, "select multiple_reserved_product.multiple_reserve_id,
     multiple_reserved_product.quantity ,
     multiple_reserved_product.price ,
     multiple_reserved.reserve_date ,
     multiple_reserved.reserve_full_price ,
     clients.client_FullName ,
     clients.client_Phone ,
     products.Product_Name ,
     products.product_Code from multiple_reserved_product INNER JOIN multiple_reserved ON multiple_reserved.multiple_reserve_id = multiple_reserved_product.multiple_reserve_id
     INNER JOIN clients ON clients.client_id=multiple_reserved.multiple_reserve_client_id
     INNER JOIN products ON products.product_id = multiple_reserve_product_id
     WHERE multiple_reserved.multiple_reserve_worker_id = $wkid ORDER BY multiple_reserved.reserve_date DESC ")or die("error");
     $t = mysqli_num_rows($q);

     $record_count = mysqli_num_rows($q);

     echo '
    <div class="">
        <div class="panel panel-default">
          <div class="panel-heading no-collapse">  <center>Total Complex Reservations: <span class="label label-warning" id="rescc"></center></span></div>






          <table class="table table-bordered table-striped" id="productTable">
              <thead>
                <tr>
                  <th>Reserve Id</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>




                </tr>
              </thead>
              <tbody>';
              $oldrvid= "";
//if($thervid = $oldrvid){
 //   echo '
   // <tr>
    //<td>'.$row['Product_Name'].'</td>

   // ';
// }
$rowcounter=1;

  while($row = mysqli_fetch_assoc($q)){
    $thervid = $row['multiple_reserve_id'];
      //
      $queryz = "SELECT count(*) as counts from multiple_reserved_product WHERE multiple_reserved_product.multiple_reserve_id= $thervid";
    $countquery=mysqli_query($connection, $queryz);
    $data=mysqli_fetch_assoc($countquery);


              echo '<tr>

                  <td id='.$row['multiple_reserve_id'].'>'.$row['multiple_reserve_id'].'</td>

                  <td>'.$row['product_Code'].'</td>
                  <td>'.$row['Product_Name'].'</td>
                  <td>'.$row['quantity'].'</td>
                  <td>'.$row['price'].'</td>
               

                  <td>'; 
                  
                  if($data['counts'] == $rowcounter){
                      echo '</tr> <tr> <td colspan="5"> ';
                      echo "<u>The Above Order Is For The Client: </u><strong>".$row['client_FullName']."</strong>&nbsp; &nbsp; <u> Phone:</u><strong>".$row['client_Phone']."</strong><br><u>The Total Price Is</u>:<strong> ".$row['reserve_full_price']."</strong> <br>Order Date:<strong>".$row['reserve_date']."</strong><hr></td>";
                      $rowcounter=1;

                      echo "<script>document.getElementById('rescc').innerHTML=$rescounter </script>";
                      ++$rescounter ;


                  }else{
                      $rowcounter ++;
                  }

                  
                  }
                  echo '
                 
';

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
       tr[i].classList.add("bg-danger");

      } else {
        tr[i].style.display = "none";
        tr[i].classList.remove("bg-danger");


      }
    }
  }
  if(input.value.length ==0){
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      tr[i].classList.remove("bg-danger");
    } } }
}
</script>
		</div>
      </main>
    </div>
  </body>

</html>
            