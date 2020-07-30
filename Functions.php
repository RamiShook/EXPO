
<?php
session_start();
include ('config.php');

// to check the phone number if exist
if (isset($_GET['phonenb'])){
    $phone=$_GET['phonenb'];
    $query="SELECT client_id From clients WHERE client_Phone='$phone'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) >0){
        echo"p";
    }else
    echo "Not Founded In The Database!";
}



//to add a new client to the database
if(isset($_GET['phone'])&& isset($_GET['name'])){
$name=$_GET['name'];
$phone=$_GET['phone'];
$address=$_GET['address'];
$notes=$_GET['notes'];
$query="INSERT INTO clients(client_FullName,client_Address,client_Phone,client_Notes) VALUES ('$name','$address','$phone','$notes')";
if(mysqli_query($connection,$query)){
    echo"added";
}else{
    die("Error Inserting Data". mysqli_error($connection)."<BR>");
}

}

if (isset($_GET['productCode'])){
    $pcode=$_GET['productCode'];

    $q="SELECT product_price FROM products WHERE product_Code='$pcode' ";
    $result = mysqli_query($connection,$q);

    $data = mysqli_fetch_assoc($result);
echo $data['product_price'];

}

if (isset($_GET['ClientPhone']) &&isset($_GET['ProductCode']) ){
$GetClientPhone=$_GET['ClientPhone'];
// query to get the client id.
$q="SELECT client_id FROM clients WHERE client_Phone='$GetClientPhone'";
$result=mysqli_query($connection,$q);
$data = mysqli_fetch_assoc($result);
//The Client Id That Have This Phone Number.
$ClientId= $data['client_id'];


// to get the worker id
$WorkerId=$_SESSION['uid'];


// to get the product id 
$GetProductCode=$_GET['ProductCode'];
$q="SELECT product_id FROM products WHERE product_Code='$GetProductCode'";
$result=mysqli_query($connection,$q)or die(mysqli_error($connection));

$data = mysqli_fetch_assoc($result);
//The Client Id That Have This Phone Number.
$ProductId= $data['product_id'];


//Decrease The Qantity From The Product Table

$GetQuantity=$_GET['Quantity'];
$q="UPDATE products SET product_Quantity = product_Quantity - '$GetQuantity' WHERE product_id='$ProductId'";

mysqli_query($connection,$q)or die(mysqli_error($connection));

// Getting The Calculated Price And The Notes
$GetPrice=$_GET['Price'];
$GetNotes=$_GET['Notes'];
$GetRow = $_GET['rowid'];
//insert The Data Into The Reservation Table.
$q="INSERT INTO reserved (reserve_product_id,reserve_worker_id,reserve_client_id,reverse_Notes,reserve_Price,reserve_Quantity,rw_id) VALUES ('$ProductId','$WorkerId','$ClientId','$GetNotes','$GetPrice','$GetQuantity','$GetRow')";
mysqli_query($connection,$q)or die(mysqli_error($connection));



}


if(isset($_GET['QuantityCheck'])){
    $GetpCode = $_GET['QuantityCheck'];
    $q="SELECT product_Quantity FROM products WHERE product_Code = '$GetpCode'";
    $result= mysqli_query($connection,$q)or die(mysqli_error($connection));
    
    $data = mysqli_fetch_assoc($result);
echo $data['product_Quantity'];
}


if(isset($_GET['deleterv'])&&isset($_GET['qt'])){

    $GetRvId= $_GET['deleterv'];
// First Need To Reset The Quantity To The Product Table.
    //Getting The Product Code.
    $GetPid = $_GET['pid'];
    //Getting The Quantity .
    $GetQt=$_GET['qt'];
$q1="UPDATE products SET product_Quantity = product_Quantity + '$GetQt' WHERE product_id = '$GetPid'";
mysqli_query($connection,$q1)or die(mysqli_error($connection));

// Remove The Record From The Reserved Table . 
$q2="DELETE FROM reserved WHERE reserve_id = '$GetRvId'";
mysqli_query($connection,$q2)or die(mysqli_error($connection));



}
if(isset($_GET['GetProductInfo'])){
    $code = $_GET['GetProductInfo'];

    $q="SELECT product_Quantity FROM products WHERE product_Code = '$code'";
    $result= mysqli_query($connection,$q)or die(mysqli_error($connection));
    
    $data = mysqli_fetch_assoc($result);
    if(is_null($data)){
        echo"Error! <br>This Product Code Was Not Founded In The Database !<br>Please Make Sure You Enter The Code Right! ";
    }else {

$q1="select reserved.reserve_Date , reserved.reverse_Notes ,workers.worker_Full_Name , reserved.reserve_Quantity from reserved,workers
WHERE  reserved.reserve_worker_id = workers.worker_id AND reserved.reserve_product_id = (select products.product_id FROM products where products.product_Code='$code')
ORDER BY reserved.reserve_Date DESC" ;
$result= mysqli_query($connection,$q1)or die(mysqli_error($connection));
    
$data1 = mysqli_fetch_assoc($result);
if(is_null($data1)){
    echo "Available Quantity: " .$data['product_Quantity']. " <br><hr>";
    echo"This Product Was Not Reserved Before!";
}else {  
    echo "Available Quantity: " .$data['product_Quantity']. " <br><hr>";
echo "Last Piece/s Reserved By: ".$data1["worker_Full_Name"]."<br><hr>";
echo "Reserve Time: ".$data1["reserve_Date"]."<hr>";
echo "Reserved Quantity: ".$data1["reserve_Quantity"]."<hr>";
echo "Notes: ".$data1["reverse_Notes"]."<br>";


//to get the product photo
$qproductpath = "SELECT product_photo_path FROM products WHERE product_code='$code' ";
$queryresult= mysqli_query($connection,$qproductpath)or die(mysqli_error($connection));
    
$path = mysqli_fetch_assoc($queryresult);
echo"<img src='".$path['product_photo_path']."'  width=100 height=100 class='thumbnailz' onerror='this.onerror=null; this.remove();'> </img>" ;
}
}
}



if(isset($_GET['mlrvcid'])&& isset($_GET['mrwid'])){

// insert a new field in the multiple reserved table.
// then get the id of the iserted row.
$mlrclientid=$_GET['mlrvcid'];
$mlrworkerid=$_GET['mrwid'];
$query="INSERT INTO multiple_reserved(multiple_reserve_worker_id,multiple_reserve_client_id,multiple_reserve_note,reserve_full_price) VALUES
 ('$mlrworkerid','$mlrclientid','','')";
if(mysqli_query($connection,$query)){
    echo"added";
     $last_id = $connection->insert_id;
    $_SESSION['last_id']= $last_id;
}else{
    die("Error Inserting Data". mysqli_error($connection)."<BR>");
}

}



if (isset($_GET['mrClientPhone']) &&isset($_GET['mrProductCode']) ){
    // to get the worker id
    
    $lid=  $_SESSION['last_id'];
    // to get the product id 
    $GetProductCode=$_GET['mrProductCode'];
    $q="SELECT product_id FROM products WHERE product_Code='$GetProductCode'";
    $result=mysqli_query($connection,$q)or die(mysqli_error($connection));
    
    $data = mysqli_fetch_assoc($result);
    //The Client Id That Have This Phone Number.
    $mrProductId= $data['product_id'];
    
    
    //Decrease The Qantity From The Product Table
    
    $mrGetQuantity=$_GET['mrQuantity'];
    $q="UPDATE products SET product_Quantity = product_Quantity - '$mrGetQuantity' WHERE product_id='$mrProductId'";
    
    mysqli_query($connection,$q)or die(mysqli_error($connection));
    
    // Getting The Calculated Price And The Notes
    $mrGetPrice=$_GET['mrPrice'];
    //getting the row id
    $mrRowId=$_GET['rwid'];
    //insert The Data Into The Reservation Table.
    $q="INSERT INTO multiple_reserved_product (multiple_reserve_id,multiple_reserve_product_id,quantity,price,row_id) VALUES ('$lid','$mrProductId','$mrGetQuantity','$mrGetPrice','$mrRowId') ";
            mysqli_query($connection,$q)or die(mysqli_error($connection));
    
    
    
    }



    if(isset($_GET['delClientPhone'])&& isset($_GET['delProductCode'])&&isset($_GET['delrowid'])){
        $row_id=$_GET['delrowid'];
        $product_code=$_GET['delProductCode'];
        $client_phone=$_GET['delClientPhone'];
        $quantity = $_GET['delquantity'];

        //getting the client id
$q="SELECT client_id FROM clients WHERE client_Phone='$client_phone'";
$resulta=mysqli_query($connection,$q);
$data = mysqli_fetch_assoc($resulta);
//The Client Id That Have This Phone Number.
$ClientId= $data['client_id'];

// getting the product id
$q1="SELECT product_id FROM products WHERE product_Code='$product_code' ";
$result = mysqli_query($connection,$q1);
$data = mysqli_fetch_assoc($result);
$product_id= $data['product_id'];


// restore the quantity to the product table

$q="UPDATE products SET product_Quantity = product_Quantity + '$quantity' WHERE product_id='$product_id'";

mysqli_query($connection,$q)or die(mysqli_error($connection));

//
$q2="DELETE FROM reserved WHERE rw_id = '$row_id' AND reserve_client_id = '$ClientId' AND reserve_product_id = '$product_id'";
mysqli_query($connection,$q2)or die(mysqli_error($connection));

    }

    // to unreserve one of multiple reserve item.
   if(isset($_GET['rmrowid'])&& isset($_GET['rspcode'])){
       $row_id = $_GET['rmrowid'];
       $quantitym=$_GET['qty'];
       $GetProductCode=$_GET['rspcode'];

       // first getting the product id from the product code.
$q="SELECT product_id FROM products WHERE product_Code='$GetProductCode'";
$result=mysqli_query($connection,$q)or die(mysqli_error($connection));

$data = mysqli_fetch_assoc($result);
$ProductId= $data['product_id'];

//delete the row from the multiple_reserved_products
$dltrq="DELETE FROM multiple_reserved_product WHERE row_id = '$row_id' AND multiple_reserve_product_id='$ProductId'";
mysqli_query($connection,$dltrq)or die(mysqli_error($connection));

//restore the quantity to the table products :

$qzz="UPDATE products SET product_Quantity = product_Quantity + '$quantitym' WHERE product_id='$ProductId'";

mysqli_query($connection,$qzz)or die(mysqli_error($connection));

//

   }

   if(isset($_GET['delMultiRvId'])){
       $MultiRvId = $_GET['delMultiRvId'];
       // To delete from multiple reserved product , 
       $dlquryMRP = "DELETE FROM multiple_reserved_product WHERE multiple_reserve_id = '$MultiRvId'";
       // To delete from multiple reserved  , 
       $dlquryMR = "DELETE FROM multiple_reserved WHERE multiple_reserve_id = '$MultiRvId'";
       mysqli_query($connection,$dlquryMRP)or die(mysqli_error($connection));
       mysqli_query($connection,$dlquryMR)or die(mysqli_error($connection));

   }

?>