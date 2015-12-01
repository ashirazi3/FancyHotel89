<?php
include("main.php");

if (isset($_POST["reservationId-submit"])) {
    $_SESSION["reservationID"] = $_POST["reservationId"];
    $reservationID = $_SESSION["reservationID"];
    $conn = connectDB("FancyHotel");
    $query = "SELECT Start_Date, End_Date FROM Reservation WHERE Reservation.ReservationID=\"" . $reservationID . "\"";
    $rs = selectQuery($conn, $query);
    while ($row = $rs->fetch_assoc()) {
        $_SESSION["startCancel"] = $row["Start_Date"];
        $_SESSION["endCancel"] = $row["End_Date"];
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cancel Reservation</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<body>

<h1>
    Cancel Reservation
</h1>
<?php
echo "<h3 style=\"text-align: center;\">" . $_SESSION["startCancel"] . " to " . $_SESSION["endCancel"] . "</h3>"
?>


<div class="fancyTable">
    <table id="fancyTable">
        <tr>
            <td>
                Room Number
            </td>
            <td>
                Room
                <br>
                Catagory
            </td>
            <td>
                Number of
                </br>
                Persons Allowed
            </td>
            <td>
                Cost Per Day
            </td>
            <td>
                Cost of Extra
                <br>
                Bed per Day
            </td>
            <td>
                Select
                <br>
                Extra Bed
            </td>
        </tr>
        <?php
        function printReservationRooms($row)
        {
            echo "<tr>";
            echo "<td>" . $row["Room_Num"] . "</td>";
            echo "<td>" . $row["Category"] . "</td>";
            echo "<td>" . $row["Num_People"] . "</td>";
            echo "<td>" . $row["Cost"] . "</td>";
            echo "<td>" . $row["Cost_ExtraBed"] . "</td>";
            echo "<td>" . $row["Extra_Bed"] . "</td>";
            echo "</tr>";
        }

        $reservationID = $_SESSION["reservationID"];
        $conn = connectDB("FancyHotel");
        $query = "SELECT Room.Room_Num, Category, Num_People, Cost, Cost_ExtraBed, Extra_Bed FROM ReserveRoom NATURAL JOIN  Room WHERE ReserveRoom.ReservationID=\"" . $reservationID . "\"";
        $rs = selectQuery($conn, $query);
        while ($row = $rs->fetch_assoc()) {
            printReservationRooms($row);
        }
        $conn->close();
        ?>
    </table>
</div>

<br>
<br>

<?php
$conn = connectDB("FancyHotel");
$query = "SELECT Total_Cost FROM Reservation WHERE ReservationID=\"" . $reservationID . "\"";
$rs = selectQuery($conn, $query);
$row = $rs->fetch_assoc();
$tCost= $row["Total_Cost"];
    echo "<h3>Total Cost of Reservation: $".$tCost."</h3>";
$conn->close();
?>


<h3 id="dateCancel"></h3>


<h3 id="refundVal">
    Amount to be Refunded:
</h3>
<script>
    var cDate = new Date();
    console.log(cDate.getDate());

    $("#dateCancel").text("Date of Cancellation - " + cDate.getFullYear() + "-" + (cDate.getMonth()+1) +"-"+ cDate.getDate());
    //
    var resDate = new Date(<?php
            echo "\"".$_SESSION["startCancel"]."\"";
        ?>);
    var diff = (resDate - cDate)/86400000;
    var refund = parseInt(<?php echo $tCost?>);
    console.log(diff);
        if(diff > 3){
        }else if(diff >0){
            refund = refund*.8;
        }else {
            refund = 0;
        }
    $("#refundVal").text("Amount to be Refunded: $" + refund);

</script>

<div class="wrapper">
    <form action="CustomerHome.php" method="POST">
        <?php
            echo '<input name="reservationID" id="resID"type="text" style="display:none;" value="'.$_SESSION["reservationID"].'">'
        ?>
        <script>
            console.log($(resID).val())
        </script>
        <button type="submit" name="cancel-res-submit">
            Submit
        </button>
    </form>
</div>

</body>
</html>
