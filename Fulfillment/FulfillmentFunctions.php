<?php
include('../config.php');

if(isset($_GET['Send'])){
    $orderid= $_GET['Send'];


    $query="UPDATE multiple_reserved SET multiple_reserve_status = 'Sended' WHERE multiple_reserve_id='$orderid'";
if(mysqli_query($connection,$query)){
echo"Sended";
}else{
die("Error Inserting Data". mysqli_error($connection)."<BR>");
}
//

}


if(isset($_GET['ReplacementDone'])){

    $orderid = $_GET['id'];
//Restore The Old Product And Quantity To The Database ,Product Table 
$IdAndQty="SELECT SUM(old_product_id_qty),old_product_id FROM change_order WHERE order_id='$orderid' GROUP BY old_product_id";
$rslt = mysqli_query($connection, $IdAndQty)or die(mysqli_error($connection));
while($row = mysqli_fetch_assoc($rslt)){
//Restore The Qty
$oldProductQty = $row['SUM(old_product_id_qty)'] ;
$oldProductId = $row['old_product_id'] ;
$qRestore = "UPDATE products SET product_Quantity = product_Quantity+'$oldProductQty'  WHERE 
                                 product_id = '$oldProductId'";

mysqli_query($connection, $qRestore)or die(mysqli_error($connection));

}



                 

/*


$queryDecrease = "UPDATE products,change_details SET products.product_Quantity = product_Quantity - 
(SELECT new_order_details_product_id_qty FROM change_details,products WHERE new_order_details_product_id = products.product_id AND change_details.order_id = '$orderid')
WHERE change_details.new_order_details_product_id = products.product_id";
                 mysqli_query($connection, $queryDecrease)or die(mysqli_error($connection));

*/
    $queryDelete = "DELETE FROM change_details WHERE order_id = '$orderid'";
    mysqli_query($connection, $queryDelete)or die(mysqli_error($connection));

    $queryDelete1 = "DELETE FROM change_order WHERE order_id = '$orderid'";
    mysqli_query($connection, $queryDelete1)or die(mysqli_error($connection));

    $queryChangeOrderStatus="UPDATE multiple_reserved SET multiple_reserve_status = 'Replaced,Sended' WHERE multiple_reserve_id='$orderid'";

    mysqli_query($connection, $queryChangeOrderStatus)or die(mysqli_error($connection));


}


?>