<?php
include('main.php');
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

if (isset($_POST['search-room-submit'])) {
    if (empty($_POST['locations']) || empty($_POST['startDate']) || empty($_POST['endDate'])) {
        $error = "Invalid Selection";
    } else {
//        echo 'HEY, IM HERE';
        $_SESSION['location'] = $_POST['locations'];
        $_SESSION['startDate'] = $_POST['startDate'];
        $_SESSION['endDate'] = $_POST['endDate'];
//        $conn = connectDB("FancyHotel");
//        $query = 'SELECT * FROM Room WHERE Location ="' . $location . '" AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE Start_Date >"' . $endDate . '" OR End_Date <"' . $startDate . '" AND ReserveRoom.ReservationID = Reservation.ReservationID)';
//        $rs = selectQuery($conn, $query);
//        $_SESSION['username'] = $username;   // Initializing Session
//        echo 'HEY, IM HERE';
        #header("location: makeReservation.php");        // Redirecting To Transfers Page
//        $conn->close();
    }
}

function printTableRow($row)
{
    echo "<tr>";
    echo "<td>" . $row["Room_Num"] . "</td>";
    echo "<td>" . $row["Category"] . "</td>";
    echo "<td>" . $row["Num_People"] . "</td>";
    echo "<td>" . $row["Cost"] . "</td>";
    echo "<td>" . $row["Cost_ExtraBed"] . "</td>";
    echo "<td><input type=\"checkbox\" name=\"Extra Bed\"></input></td>";
    echo "<td><input type=\"checkbox\" name=\"".$row["Room_Num"].",".$row["Location"]."\"></input></td>";

    echo "</tr>";
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Make a Reservation</title>
    <style>
        .element {
            width: 20%;
            margin-left: 40%;
        }

        body {
            background: url('hotel.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        th {
            color: white;

        }

        tr {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

    </style>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/makeReservation.js"></script>
</head>
<body>
<div>
</div>
<div class="container">
    <h1 style="text-align: center; color: white">Make a Reservation</h1>
    <?php
    echo "<h3 style=\"text-align: center; color: white\">".$_SESSION["startDate"]." to ".$_SESSION["endDate"]. "</h3>"
    ?>

    <form>
        <table style="margin-top: 50px" class="table table-striped">
            <thead>
            <tr id="theHead">
                <th>Room Number</th>
                <th>Room Category</th>
                <th>Num of Persons Allowed</th>
                <th>Cost per Day</th>
                <th>Cost: Extra Bed/Day</th>
                <th>Extra Bed</th>
                <th>Select Room</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $conn = connectDB("FancyHotel");
            $query = 'SELECT * FROM Room WHERE Location = "Atlanta" AND Room_Num NOT IN (SELECT Room_Num from ReserveRoom, Reservation WHERE NOT (Start_Date >"2015-11-04" OR End_Date <"2015-11-03") AND (ReserveRoom.ReservationID = Reservation.ReservationID))';
            $rs = selectQuery($conn, $query);
            while ($row = $rs->fetch_assoc()) {
                printtableRow($row);
            }
            $conn->close();
            ?>

            </tbody>
        </table>
    </form>

    <button style="margin-left: 44.5%;" type="button" class="btn btn-primary" onclick="nextSelection();">Check
        Details
    </button>
</div>
</body>
</html>