<?php
include("main.php");

function printReservationRow($row)
{
    echo "<tr>";
    echo "<td>".$row["Month"]."</td>";
    echo "<td>" . $row["Category"] . "</td>";
    echo "<td>" . $row["Location"] . "</td>";
    echo "<td>" . $row["Number of Reservations"] . "</td>";
    echo "</tr>";
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Popular Room Category Report</title>
    <link rel="stylesheet" type="text/css" href="styles/table.css">
</head>
<body>

<h1>
    Popular Room Category Report
</h1>

<div class="fancyTable">
    <table>
        <tr>
            <td>
                Month
            </td>
            <td>
                Top-Room Category
            </td>
            <td>
                Location
            </td>
            <td>
                Total Number of Reservations
                </br>
                for Room Category
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = "SELECT MONTH(Start_Date) AS 'Month', Category, ReserveRoom.Location, COUNT(Reservation.ReservationID) AS 'Number of Reservations' from Reservation, ReserveRoom, Room
where Reservation.ReservationID = ReserveRoom.ReservationID
and ReserveRoom.Room_Num = Room.Room_Num
and ReserveRoom.Location = Room.Location
GROUP BY MONTH(Start_Date), ReserveRoom.Location";
        $rs = selectQuery($conn, $query);
        while($row = $rs->fetch_assoc()){
            printReservationRow($row);
        }
        $conn->close();
        ?>

    </table>
</div>


</body>
</html>
