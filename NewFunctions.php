<!-- Functions For Change The Status Of Reservations,
     Send To Fullfilment     -->
<?php
     include('config.php');
     if(isset($_GET['changeToFf'])){
         $orderid= $_GET['changeToFf'];


         $query="UPDATE multiple_reserved SET multiple_reserve_status = 'Fulfillment' WHERE multiple_reserve_id='$orderid'";
if(mysqli_query($connection,$query)){
    echo"added";
}else{
    die("Error Inserting Data". mysqli_error($connection)."<BR>");
}

     }


     ?>


