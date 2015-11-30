<?php
include('main.php');
$conn = connectDB("FancyHotel");
$query = "SELECT Username FROM User WHERE Email='" . $_SESSION["username"] . "' OR Username='" . $_SESSION["username"] . "';";
$rs = selectQuery($conn, $query);
while($row = $rs->fetch_assoc()){
    $_SESSION["username"] = $row["Username"];
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Fancy Hotel</title>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="main.php"></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/hover.css">
    <script type="text/javascript" src="scripts/pageOptions.js"></script>
    <style>
        h1 {
            color: white;
            text-align: center

        }

        .btn {
            margin: auto;
            letter-spacing: 1px;
            padding: 2px;
            width: 100%;
            height: 140%;
        }

        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .table1 {
            visibility: visible;
            margin-top: 100px;;
            margin: auto;
            width: 40%;

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
    <table id="ordersNearby" class="table table1" style="background:transparent">
        <tr style="text-align:center;">
            <td>
                <button class="btn btn-primary" onclick="makeReservation();">Make a new reservation</button>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td>
                <button class="btn btn-info" onclick="updateReservation();">Update your reservation</button>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td>
                <button class="btn btn-primary" onclick="cancelReservation()">Cancel Reservation</button>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td>
                <button class="btn btn-info" onclick="giveFeedback();">Provide feedback</button>
            </td>
        </tr>
        <tr style="text-align:center;">
            <td>
                <button class="btn btn-primary" onclick="viewFeedback();">View feedback</button>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
