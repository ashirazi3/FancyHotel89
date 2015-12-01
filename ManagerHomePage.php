<?php
include('main.php');
if(strpos($_SESSION["username"], '@') === false){

}else{
    $conn = connectDB("FancyHotel");
    $query = "SELECT Username FROM User WHERE Email='" . $_SESSION["username"] . "' OR Username='" . $_SESSION["username"] . "';";
    $rs = selectQuery($conn, $query);
    while($row = $rs->fetch_assoc()){
        $_SESSION["username"] = $row["Username"];
    }
    $conn->close();
    echo $_SESSION["username"];
}

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">

    <title>Fancy Hotel</title>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/hover.css">
    <script type="text/javascript" src="scripts/pageOptions.js"></script>
    <style>
        h1 {
            color:white; text-align: center

        }

        .btn {
            margin: auto;
            letter-spacing: 1px;
            padding: 2px;
            width: 100%;
            height: 140%;
        }

        .table1{
            visibility: visible;
            margin-top: 100px;;
            margin: auto;
            width: 40%;

        }
        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>


</head>

<body>

<div>
    <?php
    echo "<h1> Welcome ". $_SESSION['username'] .",</h1>";
    ?>
</div>
<div style="visibility:visible; margin-top: 100px">
    <table id = "ordersNearby" class="table table1" style="background:transparent">
        <tr style="text-align:center;">
            <td><button class="btn hvr-fade" onclick="viewReservationReport();">Reservation Report</button></td>
        </tr>
        <tr style="text-align:center;">
            <td><button class="btn hvr-fade" onclick="viewRoomCategoryReport();">Popular Room Category Report</button></td>
        </tr>
        <tr style="text-align:center;">
            <td><button class="btn hvr-fade" onclick="viewRevenueReport();">Revenue Report</button></td>
    </table>
</div>



</body>
</html>
