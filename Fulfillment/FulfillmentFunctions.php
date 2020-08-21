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


?>