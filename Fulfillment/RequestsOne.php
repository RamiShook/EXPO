<?php
//   <th>Photo</th>
//<td><img src= "'.$row['product_photo_path'].' "</img> </td>

//header("Refresh: 15;");
include('../info.php');
if (!isset($_SESSION['type'])){
    HEADER("LOCATION: ../ajx.html");
}
$rescounter=1;
global $rescounter;
?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="../css/index.css">
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
          <span class="mdl-layout-title">Replacement/Return Requests For One Product Order</span>

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
          Filter By Client Phone, Name, Res Date : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Name,  Phone,  Date(2020-01-01)" title="Type The Client Name , Phone Or Date Code" size="50">
<!--        &nbsp; &nbsp; &nbsp;Search By Name: <input type="text" id="NameInput" onkeyup="SearchByName()" placeholder="Search By Name.." title="Type The Product Name"> -->
    <?PHP

require ("../config.php");

function getClientName($order_id){
    include ("../config.php");
    $q="SELECT client_FullName FROM clients,multiple_reserved where 
    multiple_reserve_id= '$order_id' AND clients.client_id = multiple_reserved.multiple_reserve_client_id";
  $result=mysqli_query($connection,$q)or die(mysqli_error($connection));

  $data = mysqli_fetch_assoc($result);
  return (  $data['client_FullName'] );

  
}

function getClientPhone($order_id){
  include ("../config.php");
  $q="SELECT client_Phone FROM clients,multiple_reserved where 
  multiple_reserve_id= '$order_id' AND clients.client_id = multiple_reserved.multiple_reserve_client_id";
$result=mysqli_query($connection,$q)or die(mysqli_error($connection));

$data = mysqli_fetch_assoc($result);
return (  $data['client_Phone'] );

}
function getProductCode($product_id){

  include("../config.php");
  $q="SELECT product_Code FROM products WHERE product_id= '$product_id' ";
  $result=mysqli_query($connection,$q)or die(mysqli_error($connection));
  $data = mysqli_fetch_assoc($result);
  return ( $data['product_Code'] );
}


    $wkid=$_SESSION['uid'];
     $q = mysqli_query($connection, "SELECT change_order.order_id,
      change_order.old_product_id, change_order.old_product_id_qty, 
      change_details.new_order_details_product_id, 
      change_details.new_order_details_product_id_qty,
       change_details.change_details_id
        FROM change_details ,change_order 
        WHERE change_order.change_id = change_details.change_id")or die("error");
     $t = mysqli_num_rows($q);

     $record_count = mysqli_num_rows($q);

     echo '
    <div class="">
        <div class="panel panel-default">
          <div class="panel-heading no-collapse">  <center>Total Complex Reservations: <span class="label label-warning" id="rescc"></span>
           <br><span class="label label-warning"><b> Note That All The Orders Here Is Confirmed By Fulfillment And Sended To The Client </b></span>
         <BR> <BR>
           </center></div>






          <table class="table table-bordered table-striped" id="productTable">
              <thead>
                <tr>
                  <th>Order Id</th>
                  <th>old Product Code</th>
                  <th>Return Qty</th>
                  <th>New Order Product</th>
                  <th>Qty</th>
                  <th>Action</th>




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
$PriceCalc = 0;

  while($row = mysqli_fetch_assoc($q)){
    $TMP_order_id = $row['order_id'];

      //
      $queryz = "sELECT count(*) as counts from change_details WHERE change_details.order_id= '$TMP_order_id'";
    $countquery=mysqli_query($connection, $queryz);
    $data=mysqli_fetch_assoc($countquery);


              echo '
              <tr id="tr'.$row['order_id'].'">
              <td>'.$row['order_id'].'</td>

              <td id='.$row['old_product_id'].'>'.getProductCode($row['old_product_id']).'</td>

              <td>'.$row['old_product_id_qty'].'</td>
              <td id='.$row['new_order_details_product_id'].'>'.getProductCode($row['new_order_details_product_id']).'</td>
              <td>'.$row['new_order_details_product_id_qty'].'</td>
             
              

                  <td>'; 
                  
                  if($data['counts'] == $rowcounter){
                      echo '</tr> <tr> <td colspan="5"> ';
                      echo "<u>The Above Order Is For The Client: </u><strong>".getClientName($TMP_order_id)."</strong>&nbsp; &nbsp;
                       <u> Phone:</u><strong>".getClientPhone($TMP_order_id)."</strong><br><u>The Total Price Is</u>:<strong> </strong> <br>Order Date:<strong>bnbn</strong><hr></td>";
                      
                    echo ' <td> <input type="button" id="'.$TMP_order_id.'" onclick="Sended('.$TMP_order_id.')" value="Done!"></input> ';
                   // <br> <br> <br><input type="button" id='.$row['multiple_reserve_id'].' onclick="edit(this.id,this)" value="Edit This Order" ></td></tr>
                    //';
                     // echo "<script>document.getElementById('rescc').innerHTML=$rescounter </script>";
                      //++$rescounter ;


                  }else{
                      $rowcounter ++;
                  }

                  
                  }
                  echo '
                 <tr><td> </<td><td> </<td><td> </<td><td> </<td><td> </<td><td> </<td> </tr>
                 <tr></tr> </tbody> </table>
';

                 

?>
<script language="javascript">

                  function Sended(x){
                    cnf=confirm("Are You Sure That You Send The New Order \nAnd Recieved The Old Product From The Client Id\nOrder Id: "+x);
                    if(!cnf) return;

                    var xmlhttp;
if(window.XMLHttpRequest)
xmlhttp = new XMLHttpRequest(); 


xmlhttp.onreadystatechange = function(){
if (xmlhttp.readyState == 4 & xmlhttp.status ==200)
console.log("On Ready State Change")
}
xmlhttp.open("GET","./FulfillmentFunctions.php?ReplacementDone=1&id="+x,false);
xmlhttp.send();  

                  }
                 
                  
  function removeRow(btnid,oButton) {
    oButton.value="This Reservation Was Deleted!";
    oButton.parentNode.innerHTML="This Reservation Was Deleted! \nRefresh The Page To Remove It";
        var empTab = document.getElementById('productTable');
        //empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
    }
                  </script>
<script>

  function Replacement(rid,rpid,pcode,qt){


window.open("./ReplacementManipulate.php?rid="+rid+"&rpid="+rpid+"&productCode="+pcode+"&qty="+qt,"_blank");     
  }
function edit(x,ths){
  //Opening New Tab To Edit The Wanted Reservation
  
  
  }


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
 // tr[i].style.display = "";
       tr[i].classList.add("bg-danger");

      } else {
       //  tr[i].style.display = "none";
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
