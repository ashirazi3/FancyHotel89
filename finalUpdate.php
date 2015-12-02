<?php

include("main.php");
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);
    header("location: CustomerHome.php");
 

if(isset($_POST['update'])){
            echo "update!";
            $conn = connectDB("FancyHotel");       
            $query = "DROP VIEW view1, goodreservations";
            $rs = selectQuery($conn, $query);
            $query2 = "UPDATE Reservation SET Start_Date = '".$_SESSION['newStartDate']."', End_Date = '".$_SESSION['newEndDate']."' WHERE ReservationID = '".$_SESSION['reservationIdd']."'";
            $rs = selectQuery($conn, $query2);
            $conn->close();
}

?>