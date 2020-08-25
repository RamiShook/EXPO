<?php
include('config.php');
// insert the reserve id in the change_order table
if(isset($_GET['Fordrid']) && !isset($_GET['npcode'])){
    $odid=$_GET['Fordrid'];
    $rpid=$_GET['rpid'];
    $qty = $_GET['qty'];
    //inserting the data in the change_order table
    $q="INSERT INTO change_order(order_id,old_product_id,old_product_id_qty)VALUES('$odid','$rpid','$qty')";
    mysqli_query($connection,$q)or die(mysqli_error($connection));

    echo"ok";

}

//Set the data in the change_order_details table
if(isset($_GET['npcode'])){
//get the product id from its code
    $GetProductCode=$_GET['npcode'];
    $q="SELECT product_id FROM products WHERE product_Code='$GetProductCode'";
    $result=mysqli_query($connection,$q)or die(mysqli_error($connection));
    $data = mysqli_fetch_assoc($result);
    $ProductId= $data['product_id'];

//get The change_order id when matched to this order product change
$odid=$_GET['Fordrid'];
    $rpid=$_GET['rpid'];
    $qty = $_GET['qty'];
$q1="SELECT change_id FROM change_order WHERE order_id='$odid' AND old_product_id='$rpid' AND old_product_id_qty='$qty' ORDER BY change_id DESC";
$result1=mysqli_query($connection,$q1)or die(mysqli_error($connection));
$data1 = mysqli_fetch_assoc($result1);
$ChangeId=$data1['change_id'];
echo "Change Id is: ".$ChangeId;
print_r($data1);
echo"<br>";

// insert the data into change_details  
$newqty=$_GET['npqty'];
$q3="INSERT INTO change_details(change_id,new_order_details_product_id,new_order_details_product_id_qty,order_id)VALUES('$ChangeId','$ProductId','$newqty','$odid')";
mysqli_query($connection,$q3)or die(mysqli_error($connection));

// Change The Order Status In Multiple reserve
$q4="UPDATE multiple_reserved SET multiple_reserve_status='Replacement' WHERE multiple_reserve_id=$odid ";
mysqli_query($connection,$q4)or die(mysqli_error($connection));
//Decrease The New ordered Product Quantity from products
$qDecrease = "UPDATE products SET product_Quantity = product_Quantity - '$newqty' WHERE product_id='$ProductId' ";
mysqli_query($connection,$qDecrease)or die(mysqli_error($connection));

}



if(isset($_GET['ReturnOID'])){
    $odid=$_GET['ReturnOID'];
    $rpid=$_GET['OPID'];
    $qty = $_GET['Qty'];
    //inserting the data in the change_order table
    $q="INSERT INTO change_order(order_id,old_product_id,old_product_id_qty)VALUES('$odid','$rpid','$qty')";
    mysqli_query($connection,$q)or die(mysqli_error($connection));

    //get the change id
    $q1="SELECT change_id FROM change_order WHERE order_id='$odid' AND old_product_id='$rpid' AND old_product_id_qty='$qty' ORDER BY change_id DESC";
$result1=mysqli_query($connection,$q1)or die(mysqli_error($connection));
$data1 = mysqli_fetch_assoc($result1);
$ChangeId=$data1['change_id'];


// insertig 0 
$q3="INSERT INTO change_details(change_id,new_order_details_product_id,new_order_details_product_id_qty,order_id)VALUES('$ChangeId',0,0,'$odid')";
mysqli_query($connection,$q3)or die(mysqli_error($connection));
    

}



?>