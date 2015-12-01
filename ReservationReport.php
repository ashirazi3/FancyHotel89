<?php
include("main.php");

function printReservationRow($row)
{
    echo "<tr>";
    echo "<td>".$row["Month"]."</td>";
    echo "<td>" . $row["Location"] . "</td>";
    echo "<td>" . $row["Number of Reservations"] . "</td>";
    echo "</tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Report</title>
    <link rel="stylesheet" type="text/css" href="styles/table.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<body>

<h1>
    Reservation Report
</h1>

<div class="fancyTable">
    <table>
        <tr>
            <td>
                Month
            </td>
            <td>
                Location
            </td>
            <td>
                Total Number
                </br>
                of Reservations
            </td>
        </tr>
        <tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = "SELECT MONTH(Start_Date) AS 'Month', Location, COUNT(Reservation.ReservationID) AS 'Number of Reservations' from Reservation, ReserveRoom
                    where Reservation.ReservationID = ReserveRoom.ReservationID
                    GROUP BY MONTH(Start_Date), Location";
        $rs = selectQuery($conn, $query);
        while($row = $rs->fetch_assoc()){
            printReservationRow($row);
        }
        $conn->close();
        ?>
</div>



</body>
</html>
