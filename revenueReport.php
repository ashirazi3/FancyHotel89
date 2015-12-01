<?php
include("main.php");

function printReservationRow($row)
{
    echo "<tr>";
    echo "<td>".$row["Month"]."</td>";
    echo "<td>" . $row["Location"] . "</td>";
    echo "<td>" . $row["Total Revenue"] . "</td>";
    echo "</tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revenue Report</title>
    <link rel="stylesheet" type="text/css" href="styles/table.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<body>

<h1>
    Revenue Report
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
                Total Revenue
            </td>
        </tr>
        <?php
        $conn = connectDB("FancyHotel");
        $query = "SELECT MONTH(Start_Date) AS 'Month', ReserveRoom.Location, SUM(Reservation.Total_Cost) AS 'Total Revenue' from Reservation, ReserveRoom
where Reservation.ReservationID = ReserveRoom.ReservationID
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
